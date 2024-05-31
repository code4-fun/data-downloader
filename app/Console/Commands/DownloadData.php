<?php

namespace App\Console\Commands;

use App\Models\Stock;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class DownloadData extends Command
{
  /**
   * The name and signature of the console command.
   *
   * @var string
   */
  protected $signature = 'data:download';

  /**
   * The console command description.
   *
   * @var string
   */
  protected $description = 'Download sales, orders, stocks, and incomes data from API and save to database';

  protected $apiKey;
  protected $baseUrl;

  public function __construct()
  {
    parent::__construct();

    $this->apiKey = env('KEY');
    $this->baseUrl = env('BASE_URL');
  }

  /**
   * Execute the console command.
   */
  public function handle()
  {
    $this->downloadData('sales');
    $this->downloadData('orders');
    $this->downloadStocks();
    $this->downloadData('incomes');
  }

  private function downloadData($type)
  {
    $page = 1;
    $dateFrom = '1800-01-01';
    $dateTo = '2024-06-06';
    do {
      $response = Http::get("{$this->baseUrl}/{$type}", [
        'dateFrom' => $dateFrom,
        'dateTo' => $dateTo,
        'page' => $page,
        'key' => $this->apiKey
      ]);

      $data = $response->json()['data'];

      foreach ($data as $item) {
        $modelClass = 'App\Models\\' . ucfirst(rtrim($type, 's'));
        $modelClass::create($item);
      }

      $page++;
    } while (!empty($data));
  }

  private function downloadStocks()
  {
    $page = 1;
    do {
      $response = Http::get("{$this->baseUrl}/stocks", [
        'dateFrom' => now()->toDateString(),
        'page' => $page,
        'key' => $this->apiKey
      ]);

      $data = $response->json()['data'];

      foreach ($data as $item) {
        Stock::create($item);
      }

      $page++;
    } while (!empty($data));
  }
}
