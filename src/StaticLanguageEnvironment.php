<?php

namespace Butterfly\Component\Translator;

/**
 * @author Marat Fakhertdinov <marat.fakhertdinov@gmail.com>
 */
class StaticLanguageEnvironment implements ILanguageEnvironment
{
    /**
     * @var string
     */
    protected $language;

    /**
     * @param string $language
     */
    public function __construct($language)
    {
        $this->language = $language;
    }

    /**
     * @return string
     */
    public function getLanguage()
    {
        return $this->language;
    }
}
