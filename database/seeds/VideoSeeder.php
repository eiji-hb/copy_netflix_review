<?php

use Illuminate\Database\Seeder;
const LIMIT = 1000;

use App\Models\Video;
class VideoSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $curl = curl_init();
    #limitが最大100なので100でづつoffsetしながらcallする
    for($i = 0;$i <= LIMIT;$i += 100){
      // echo "https://unogsng.p.rapidapi.com/search?countrylist=267&limit=100&offset=".$i;
      curl_setopt_array($curl, array(
        CURLOPT_URL => "https://unogsng.p.rapidapi.com/search?countrylist=267&limit=100&offset=".$i,
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
      $data = json_decode($response, true);
      $err = curl_error($curl);
      # 0~99まで繰り返す
      for($j = 0; $j < count($data["results"]); $j++ ){
        $videos = App\Models\Video::all();
        if ($err) {
          echo "cURL Error #:" . $err;
        }elseif($videos->contains('nfid',$data["results"][$j]["nfid"]))
        {
          echo "continue:".$j."/".count($data["results"]).PHP_EOL;
          # すでに保存済みのデータはスキップする
          continue;
        }
        else {
        $video = new Video;
        $video->vtype     = $data["results"][$j]["vtype"];
        $video->nfid      = $data["results"][$j]["nfid"];
        $video->imdbid    = $data["results"][$j]["imdbid"];
        $video->title     = $data["results"][$j]["title"];
        $video->titledate = $data["results"][$j]["titledate"];
        $video->synopsis  = $data["results"][$j]["synopsis"];
        $video->year      = $data["results"][$j]["year"];
        $video->runtime   = $data["results"][$j]["runtime"];
        $video->save();
        echo "save:".$j."/".count($data["results"]).PHP_EOL;
        }
      }
      sleep(1);
      echo "---残り:".$i."/".LIMIT."---".PHP_EOL;
    }
    echo "---終了---".PHP_EOL;
    # すべての呼び出しが終了してからcloseする
    curl_close($curl);
  }
}
