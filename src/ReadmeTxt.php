<?php

namespace Codaptive\WordpressPackageBump;

use ConventionalChangelog\Type\PackageBump;

class ReadmeTxt extends PackageBump
{
    /**
     * {@inheritdoc}
     */
    protected $fileName = 'readme.txt';

    /**
     * {@inheritdoc}
     */
    protected $lockFiles = [];

    /**
     * {@inheritdoc}
     */
    protected $fileType = 'txt';

    /**
     * {@inheritdoc}
     */
    public function getVersion(): ?string
    {
        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function setVersion(string $version): self
    {
        $pattern = '/Stable tag: (\d)+.(\d)+.(\d)+/';
        $replacement = sprintf('Stable tag: %s', $version);
        $this->content = preg_replace($pattern, $replacement, $this->content, 1);

        return $this;
    }
}
