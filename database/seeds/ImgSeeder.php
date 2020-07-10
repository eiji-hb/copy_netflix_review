<?php

use Illuminate\Database\Seeder;
use App\Models\Video;

class ImgSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $curl = curl_init();
      $videos = App\Models\Video::all();
      $nfids = $videos->pluck('nfid','id');
      $count = count($nfids);
      foreach($nfids as $id=>$nfid){
        $video =  App\Models\Video::find($id);
        // echo $id.PHP_EOL;
        if($video->img){
          echo "id:".$id."保存済み".PHP_EOL;
        }else{
          curl_setopt_array($curl, array(
            CURLOPT_URL => "https://unogsng.p.rapidapi.com/images?netflixid=".$nfid,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
              "x-rapidapi-host: ".config('services.net.host'),
              "x-rapidapi-key: ".config('services.net.key'),
            ),
          ));
          $response = curl_exec($curl);
          $err = curl_error($curl);
          if ($err) {
            echo "cURL Error #:" . $err;
          } else {
            $data = json_decode($response, true);
            for($i = 0; $i < count($data["results"]);$i++){
              if($data["results"][$i]["itype"] === "bo342x684"){
                $video->img = $data["results"][$i]["url"];
                $video->save();
                echo "id:".$id."_saved".PHP_EOL;
                break;
                sleep(1);
              }
            }
          }
        }
        $count--;
        echo "残り: ".$count."/".count($nfids).PHP_EOL;
      }
      echo "---終了---".PHP_EOL;
      curl_close($curl);
    }
}
