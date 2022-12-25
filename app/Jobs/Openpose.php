<?php

namespace App\Jobs;

use App\Models\Record;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;

class Openpose implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $recordId = null;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($recordId)
    {
        $this->recordId = $recordId;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $record = Record::find($this->recordId);
        $shouldUseLabApi = config('app.use_lab_api');

        sleep(5);

        if ($shouldUseLabApi) {
            // Unfinished lab api calling.
            $mediaItems = $record->getMedia('videos');

            $stringArray = explode('.', $mediaItems[0]->file_name);
            $mimetype = $stringArray[count($stringArray) - 1];

            $typesString = array('手指捏握', '手部抓握', '手掌翻面', '抬腳');
            $types = array('t25', 't24', 't26', 't23');

            $filename = date('Ymd') . '_' . $mediaItems[0]->id . '_' . $types[array_search($record->category, $typesString)] . '.' . $mimetype;

            echo($filename);

            $response = Http::withoutVerifying()
                ->timeout(300)
                ->attach(
                    'video',
                    file_get_contents(storage_path('app/public/' . $mediaItems[0]->id . '/' . $mediaItems[0]->file_name)),
                    $filename,
                )
                ->post('https://140.123.105.112:51003/upload/analyze', ['filename' => $filename]);

            $result = $response->json();

            $record->update([
                'result' => json_encode($result),
                'status' => '待檢閱',
            ]);
        } else {
            $record->update([
                'result' => '{"left":87,"right":87}',
                'status' => '待檢閱',
            ]);
        }
    }
}
