<?php

namespace App\Jobs;

use App\Models\Document;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class GenerateDummyDocuments implements ShouldQueue
{
	use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

	/**
	 * Create a new job instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//
	}

	/**
	 * Execute the job.
	 *
	 * @return void
	 */
	public function handle()
	{
		$text = Storage::disk('public')->get('texto_dump.txt');
		$content = null;
		$a = 1;

		do {
			$content = substr($text, 0, 1000);
			$text = mb_substr($text, 1000, null);
			$document = new Document;
			$document->file_path = $a . '.jpg';
			$document->content = mb_scrub($content);
			$document->organization_id = ($a % 3) + 1;
			$document->save();
			$a++;

		} while ($text != '');
	}
}
