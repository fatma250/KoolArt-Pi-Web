<?php

namespace Symfony\Config;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class GregwarCaptchaConfig implements \Symfony\Component\Config\Builder\ConfigBuilderInterface
{
    private $length;
    private $width;
    private $height;
    private $font;
    private $keepValue;
    private $charset;
    private $asFile;
    private $asUrl;
    private $reload;
    private $imageFolder;
    private $webPath;
    private $gcFreq;
    private $expiration;
    private $quality;
    private $invalidMessage;
    private $bypassCode;
    private $whitelistKey;
    private $humanity;
    private $distortion;
    private $maxFrontLines;
    private $maxBehindLines;
    private $interpolation;
    private $textColor;
    private $backgroundColor;
    private $backgroundImages;
    private $disabled;
    private $ignoreAllEffects;
    private $sessionKey;
    private $_usedProperties = [];

    /**
     * @default 5
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function length($value): self
    {
        $this->_usedProperties['length'] = true;
        $this->length = $value;

        return $this;
    }

    /**
     * @default 130
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function width($value): self
    {
        $this->_usedProperties['width'] = true;
        $this->width = $value;

        return $this;
    }

    /**
     * @default 50
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function height($value): self
    {
        $this->_usedProperties['height'] = true;
        $this->height = $value;

        return $this;
    }

    /**
     * @default 'C:\\Users\\DELL\\Downloads\\sourour pi\\SymfonyPiDev\\vendor\\gregwar\\captcha-bundle\\DependencyInjection/../Generator/Font/captcha.ttf'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function font($value): self
    {
        $this->_usedProperties['font'] = true;
        $this->font = $value;

        return $this;
    }

    /**
     * @default false
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function keepValue($value): self
    {
        $this->_usedProperties['keepValue'] = true;
        $this->keepValue = $value;

        return $this;
    }

    /**
     * @default 'abcdefhjkmnprstuvwxyz23456789'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function charset($value): self
    {
        $this->_usedProperties['charset'] = true;
        $this->charset = $value;

        return $this;
    }

    /**
     * @default false
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function asFile($value): self
    {
        $this->_usedProperties['asFile'] = true;
        $this->asFile = $value;

        return $this;
    }

    /**
     * @default false
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function asUrl($value): self
    {
        $this->_usedProperties['asUrl'] = true;
        $this->asUrl = $value;

        return $this;
    }

    /**
     * @default false
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function reload($value): self
    {
        $this->_usedProperties['reload'] = true;
        $this->reload = $value;

        return $this;
    }

    /**
     * @default 'captcha'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function imageFolder($value): self
    {
        $this->_usedProperties['imageFolder'] = true;
        $this->imageFolder = $value;

        return $this;
    }

    /**
     * @default '%kernel.project_dir%/public'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function webPath($value): self
    {
        $this->_usedProperties['webPath'] = true;
        $this->webPath = $value;

        return $this;
    }

    /**
     * @default 100
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function gcFreq($value): self
    {
        $this->_usedProperties['gcFreq'] = true;
        $this->gcFreq = $value;

        return $this;
    }

    /**
     * @default 60
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function expiration($value): self
    {
        $this->_usedProperties['expiration'] = true;
        $this->expiration = $value;

        return $this;
    }

    /**
     * @default 50
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function quality($value): self
    {
        $this->_usedProperties['quality'] = true;
        $this->quality = $value;

        return $this;
    }

    /**
     * @default 'Bad code value'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function invalidMessage($value): self
    {
        $this->_usedProperties['invalidMessage'] = true;
        $this->invalidMessage = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function bypassCode($value): self
    {
        $this->_usedProperties['bypassCode'] = true;
        $this->bypassCode = $value;

        return $this;
    }

    /**
     * @default 'captcha_whitelist_key'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function whitelistKey($value): self
    {
        $this->_usedProperties['whitelistKey'] = true;
        $this->whitelistKey = $value;

        return $this;
    }

    /**
     * @default 0
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function humanity($value): self
    {
        $this->_usedProperties['humanity'] = true;
        $this->humanity = $value;

        return $this;
    }

    /**
     * @default true
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function distortion($value): self
    {
        $this->_usedProperties['distortion'] = true;
        $this->distortion = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function maxFrontLines($value): self
    {
        $this->_usedProperties['maxFrontLines'] = true;
        $this->maxFrontLines = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function maxBehindLines($value): self
    {
        $this->_usedProperties['maxBehindLines'] = true;
        $this->maxBehindLines = $value;

        return $this;
    }

    /**
     * @default true
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function interpolation($value): self
    {
        $this->_usedProperties['interpolation'] = true;
        $this->interpolation = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<mixed|ParamConfigurator> $value
     * @return $this
     */
    public function textColor($value): self
    {
        $this->_usedProperties['textColor'] = true;
        $this->textColor = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<mixed|ParamConfigurator> $value
     * @return $this
     */
    public function backgroundColor($value): self
    {
        $this->_usedProperties['backgroundColor'] = true;
        $this->backgroundColor = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<mixed|ParamConfigurator> $value
     * @return $this
     */
    public function backgroundImages($value): self
    {
        $this->_usedProperties['backgroundImages'] = true;
        $this->backgroundImages = $value;

        return $this;
    }

    /**
     * @default false
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function disabled($value): self
    {
        $this->_usedProperties['disabled'] = true;
        $this->disabled = $value;

        return $this;
    }

    /**
     * @default false
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function ignoreAllEffects($value): self
    {
        $this->_usedProperties['ignoreAllEffects'] = true;
        $this->ignoreAllEffects = $value;

        return $this;
    }

    /**
     * @default 'captcha'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function sessionKey($value): self
    {
        $this->_usedProperties['sessionKey'] = true;
        $this->sessionKey = $value;

        return $this;
    }

    public function getExtensionAlias(): string
    {
        return 'gregwar_captcha';
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('length', $value)) {
            $this->_usedProperties['length'] = true;
            $this->length = $value['length'];
            unset($value['length']);
        }

        if (array_key_exists('width', $value)) {
            $this->_usedProperties['width'] = true;
            $this->width = $value['width'];
            unset($value['width']);
        }

        if (array_key_exists('height', $value)) {
            $this->_usedProperties['height'] = true;
            $this->height = $value['height'];
            unset($value['height']);
        }

        if (array_key_exists('font', $value)) {
            $this->_usedProperties['font'] = true;
            $this->font = $value['font'];
            unset($value['font']);
        }

        if (array_key_exists('keep_value', $value)) {
            $this->_usedProperties['keepValue'] = true;
            $this->keepValue = $value['keep_value'];
            unset($value['keep_value']);
        }

        if (array_key_exists('charset', $value)) {
            $this->_usedProperties['charset'] = true;
            $this->charset = $value['charset'];
            unset($value['charset']);
        }

        if (array_key_exists('as_file', $value)) {
            $this->_usedProperties['asFile'] = true;
            $this->asFile = $value['as_file'];
            unset($value['as_file']);
        }

        if (array_key_exists('as_url', $value)) {
            $this->_usedProperties['asUrl'] = true;
            $this->asUrl = $value['as_url'];
            unset($value['as_url']);
        }

        if (array_key_exists('reload', $value)) {
            $this->_usedProperties['reload'] = true;
            $this->reload = $value['reload'];
            unset($value['reload']);
        }

        if (array_key_exists('image_folder', $value)) {
            $this->_usedProperties['imageFolder'] = true;
            $this->imageFolder = $value['image_folder'];
            unset($value['image_folder']);
        }

        if (array_key_exists('web_path', $value)) {
            $this->_usedProperties['webPath'] = true;
            $this->webPath = $value['web_path'];
            unset($value['web_path']);
        }

        if (array_key_exists('gc_freq', $value)) {
            $this->_usedProperties['gcFreq'] = true;
            $this->gcFreq = $value['gc_freq'];
            unset($value['gc_freq']);
        }

        if (array_key_exists('expiration', $value)) {
            $this->_usedProperties['expiration'] = true;
            $this->expiration = $value['expiration'];
            unset($value['expiration']);
        }

        if (array_key_exists('quality', $value)) {
            $this->_usedProperties['quality'] = true;
            $this->quality = $value['quality'];
            unset($value['quality']);
        }

        if (array_key_exists('invalid_message', $value)) {
            $this->_usedProperties['invalidMessage'] = true;
            $this->invalidMessage = $value['invalid_message'];
            unset($value['invalid_message']);
        }

        if (array_key_exists('bypass_code', $value)) {
            $this->_usedProperties['bypassCode'] = true;
            $this->bypassCode = $value['bypass_code'];
            unset($value['bypass_code']);
        }

        if (array_key_exists('whitelist_key', $value)) {
            $this->_usedProperties['whitelistKey'] = true;
            $this->whitelistKey = $value['whitelist_key'];
            unset($value['whitelist_key']);
        }

        if (array_key_exists('humanity', $value)) {
            $this->_usedProperties['humanity'] = true;
            $this->humanity = $value['humanity'];
            unset($value['humanity']);
        }

        if (array_key_exists('distortion', $value)) {
            $this->_usedProperties['distortion'] = true;
            $this->distortion = $value['distortion'];
            unset($value['distortion']);
        }

        if (array_key_exists('max_front_lines', $value)) {
            $this->_usedProperties['maxFrontLines'] = true;
            $this->maxFrontLines = $value['max_front_lines'];
            unset($value['max_front_lines']);
        }

        if (array_key_exists('max_behind_lines', $value)) {
            $this->_usedProperties['maxBehindLines'] = true;
            $this->maxBehindLines = $value['max_behind_lines'];
            unset($value['max_behind_lines']);
        }

        if (array_key_exists('interpolation', $value)) {
            $this->_usedProperties['interpolation'] = true;
            $this->interpolation = $value['interpolation'];
            unset($value['interpolation']);
        }

        if (array_key_exists('text_color', $value)) {
            $this->_usedProperties['textColor'] = true;
            $this->textColor = $value['text_color'];
            unset($value['text_color']);
        }

        if (array_key_exists('background_color', $value)) {
            $this->_usedProperties['backgroundColor'] = true;
            $this->backgroundColor = $value['background_color'];
            unset($value['background_color']);
        }

        if (array_key_exists('background_images', $value)) {
            $this->_usedProperties['backgroundImages'] = true;
            $this->backgroundImages = $value['background_images'];
            unset($value['background_images']);
        }

        if (array_key_exists('disabled', $value)) {
            $this->_usedProperties['disabled'] = true;
            $this->disabled = $value['disabled'];
            unset($value['disabled']);
        }

        if (array_key_exists('ignore_all_effects', $value)) {
            $this->_usedProperties['ignoreAllEffects'] = true;
            $this->ignoreAllEffects = $value['ignore_all_effects'];
            unset($value['ignore_all_effects']);
        }

        if (array_key_exists('session_key', $value)) {
            $this->_usedProperties['sessionKey'] = true;
            $this->sessionKey = $value['session_key'];
            unset($value['session_key']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['length'])) {
            $output['length'] = $this->length;
        }
        if (isset($this->_usedProperties['width'])) {
            $output['width'] = $this->width;
        }
        if (isset($this->_usedProperties['height'])) {
            $output['height'] = $this->height;
        }
        if (isset($this->_usedProperties['font'])) {
            $output['font'] = $this->font;
        }
        if (isset($this->_usedProperties['keepValue'])) {
            $output['keep_value'] = $this->keepValue;
        }
        if (isset($this->_usedProperties['charset'])) {
            $output['charset'] = $this->charset;
        }
        if (isset($this->_usedProperties['asFile'])) {
            $output['as_file'] = $this->asFile;
        }
        if (isset($this->_usedProperties['asUrl'])) {
            $output['as_url'] = $this->asUrl;
        }
        if (isset($this->_usedProperties['reload'])) {
            $output['reload'] = $this->reload;
        }
        if (isset($this->_usedProperties['imageFolder'])) {
            $output['image_folder'] = $this->imageFolder;
        }
        if (isset($this->_usedProperties['webPath'])) {
            $output['web_path'] = $this->webPath;
        }
        if (isset($this->_usedProperties['gcFreq'])) {
            $output['gc_freq'] = $this->gcFreq;
        }
        if (isset($this->_usedProperties['expiration'])) {
            $output['expiration'] = $this->expiration;
        }
        if (isset($this->_usedProperties['quality'])) {
            $output['quality'] = $this->quality;
        }
        if (isset($this->_usedProperties['invalidMessage'])) {
            $output['invalid_message'] = $this->invalidMessage;
        }
        if (isset($this->_usedProperties['bypassCode'])) {
            $output['bypass_code'] = $this->bypassCode;
        }
        if (isset($this->_usedProperties['whitelistKey'])) {
            $output['whitelist_key'] = $this->whitelistKey;
        }
        if (isset($this->_usedProperties['humanity'])) {
            $output['humanity'] = $this->humanity;
        }
        if (isset($this->_usedProperties['distortion'])) {
            $output['distortion'] = $this->distortion;
        }
        if (isset($this->_usedProperties['maxFrontLines'])) {
            $output['max_front_lines'] = $this->maxFrontLines;
        }
        if (isset($this->_usedProperties['maxBehindLines'])) {
            $output['max_behind_lines'] = $this->maxBehindLines;
        }
        if (isset($this->_usedProperties['interpolation'])) {
            $output['interpolation'] = $this->interpolation;
        }
        if (isset($this->_usedProperties['textColor'])) {
            $output['text_color'] = $this->textColor;
        }
        if (isset($this->_usedProperties['backgroundColor'])) {
            $output['background_color'] = $this->backgroundColor;
        }
        if (isset($this->_usedProperties['backgroundImages'])) {
            $output['background_images'] = $this->backgroundImages;
        }
        if (isset($this->_usedProperties['disabled'])) {
            $output['disabled'] = $this->disabled;
        }
        if (isset($this->_usedProperties['ignoreAllEffects'])) {
            $output['ignore_all_effects'] = $this->ignoreAllEffects;
        }
        if (isset($this->_usedProperties['sessionKey'])) {
            $output['session_key'] = $this->sessionKey;
        }

        return $output;
    }

}
