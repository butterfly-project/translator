<?php

namespace Butterfly\Component\Translator;

/**
 * @author Marat Fakhertdinov <marat.fakhertdinov@gmail.com>
 */
class Translator
{
    /**
     * @var array
     */
    protected $translates;

    /**
     * @var ILanguageEnvironment
     */
    protected $languageEnvironment;

    /**
     * @param array $translates
     * @param ILanguageEnvironment $languageEnvironment
     */
    public function __construct(array $translates, ILanguageEnvironment $languageEnvironment)
    {
        $this->translates          = $translates;
        $this->languageEnvironment = $languageEnvironment;
    }

    /**
     * @param string $str
     * @return string
     */
    public function translate($str)
    {
        return $this->translateToLanguage($str, $this->languageEnvironment->getLanguage());
    }

    /**
     * @param string $str
     * @param string $language
     * @return string
     */
    public function translateToLanguage($str, $language)
    {
        if (!array_key_exists($language, $this->translates)) {
            return $str;
        }

        if (!array_key_exists($str, $this->translates[$language])) {
            return $str;
        }

        return $this->translates[$language][$str];
    }
}
