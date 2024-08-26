<?php

namespace Codaptive\WordpressPackageBump;

use ConventionalChangelog\Type\PackageBump;

class Plugin extends PackageBump
{
    /**
     * {@inheritdoc}
     */
    protected $fileName = '';

    /**
     * {@inheritdoc}
     */
    protected $lockFiles = [];

    /**
     * {@inheritdoc}
     */
    protected $fileType = 'php';

    /**
     * {@inheritdoc}
     */
    public function __construct(string $path)
    {
        $pluginName = basename($path);
        $this->fileName = sprintf('%s.php', $pluginName);

        parent::__construct($path);
    }

    /**
     * {@inheritdoc}
     */
    public function getVersion(): ?string
    {
        preg_match('/Version: (\d+.\d+.\d+)/', $this->originContent, $matches);

        return $matches[1];
    }

    /**
     * {@inheritdoc}
     */
    public function setVersion(string $version): self
    {
        $currentVersion = $this->getVersion();

        $this->content = str_replace($currentVersion, $version, $this->content);

        return $this;
    }
}
