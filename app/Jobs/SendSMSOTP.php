<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Client;
use GuzzleHttp\Promise;

class SendSMSOTP implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * The number of seconds to wait before retrying the job.
     *
     * @var int
     */
    public $retryAfter = 5;

    /**
     * The number of times the job may be attempted.
     *
     * @var int
     */
    public $tries = 3;

    /**
     * Delete the job if its models no longer exist.
     *
     * @var bool
     */
    public $deleteWhenMissingModels = true;

    protected $payload;

    protected $template = 'RM0.00 Debagoods: Your verification code is ';

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($payload)
    {
        $this->payload = $payload;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
      $payload = $this->payload;

      $smsUrl = config('app.send_sms_url');
      $smsUrl .= '?apiKey='.config('app.send_sms_api_key');
      $smsUrl .= '&recipients='.$payload['phone_number'];
      $smsUrl .= '&messageContent='.$this->template . $payload['otp'];
      $smsUrl .= '&referenceID='.$payload['reference_id'];

      $client = new Client();
      $promise = $client->requestAsync('GET', $smsUrl);

      $promise->then(
          function (ResponseInterface $res) {
              $json = $res->getBody();
              $json = json_decode($json);
              echo $json;
          },
          function (RequestException $e) {
              echo $e->getMessage();

          }
      );


      Promise\settle($promise)->wait();

    }
}
