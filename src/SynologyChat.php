<?php
namespace Auoyi\Synology;

use GuzzleHttp\Client;
use Illuminate\Config\Repository;
use Illuminate\Session\SessionManager;

class SynologyChat
{
    /**
     * @var SessionManager
     */
    protected $session;
    /**
     * @var Repository
     */
    protected $config;
    /**
     * Packagetest constructor.
     * @param SessionManager $session
     * @param Repository $config
     */
    public function __construct(SessionManager $session, Repository $config)
    {
        $this->session = $session;
        $this->config = $config;
    }
    /**
     * @param string $msg
     * @return string
     */
    public function pushMessage($msg = '', array $user_ids)
    {
        $webhook_url = $this->config->get('synology.SYNOLOGY_CHAT_WEBHOOK_URL');
        $client = new Client(['cookies' => true]);
        $payload = json_encode(['text' => $msg, 'user_ids' => $user_ids]);
        $response = $client->post($webhook_url, ['body' => 'payload=' . urlencode($payload)]);
        $rs = $response->getBody()->getContents();
        return $rs;
    }
}
