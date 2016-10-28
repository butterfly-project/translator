<?php

namespace Butterfly\Component\Translator;

/**
 * @author Marat Fakhertdinov <marat.fakhertdinov@gmail.com>
 */
class TranslateTwigExtension extends \Twig_Extension
{
    /**
     * @var Translator
     */
    protected $translator;

    /**
     * @param Translator $translator
     */
    public function __construct(Translator $translator)
    {
        $this->translator = $translator;
    }

    /**
     * @return array
     */
    public function getFilters()
    {
        return [
            new \Twig_SimpleFilter('tr', [$this, 'translate']),
            new \Twig_SimpleFilter('trl', [$this, 'translateToLanguage']),
        ];
    }

    /**
     * @param string $str
     * @param array $replaces
     * @return string
     */
    public function translate($str, array $replaces = array())
    {
        return $this->replaceStr($this->translator->translate($str), $replaces);
    }

    /**
     * @param string $str
     * @param string $language
     * @param array $replaces
     * @return string
     */
    public function translateToLanguage($str, $language, array $replaces = array())
    {
        return $this->replaceStr($this->translator->translateToLanguage($str, $language), $replaces);
    }

    /**
     * @param string $str
     * @param array $replaces
     * @return string
     */
    protected function replaceStr($str, array $replaces)
    {
        return str_replace(array_keys($replaces), array_values($replaces), $str);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'translator.extension';
    }
}
