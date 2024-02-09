<?php
/**
 * @author Basic App Dev Team
 * @license MIT
 */
namespace BasicApp\Bootstrap5\Publishers;

use BasicApp\Core\Publisher as BasePublisher;

class Publisher extends BasePublisher
{

    protected $destination = FCPATH . 'assets' . DIRECTORY_SEPARATOR . 'bootstrap5';

    public $createDestination = true;

    public $url = 'https://github.com/twbs/bootstrap/releases/download/v5.3.2/bootstrap-5.3.2-dist.zip';

    public function publish(): bool
    {
        return $this->wipe()
            ->downloadFile($this->url)
            ->extractZipArchive($this->getScratch() . 'bootstrap-5.3.2-dist.zip')
            ->setSource($this->getScratch() . 'bootstrap-5.3.2-dist')
            ->addPath('css')
            ->addPath('js')
            ->merge(true);
    }

}