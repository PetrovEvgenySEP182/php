<?php


namespace HTML\Doctype;


class DocumentTypeDefinition
{
    protected $isRegistered;
    protected $organization;
    protected $type;
    protected $name;
    protected $language;
    protected $url;

    public function __construct(string $typeDefinition = "")
    {
        $this->parseTypeDefinition($typeDefinition);
    }

    //<editor-fold desc="RegisteredRegion">
    function setRegistered(bool $value){
        $this->isRegistered = $value;
        return $this;
    }

    function getRegistered() : bool {
        return $this->isRegistered;
    }

    function convertRegisteredToValue(string $registered) : bool {
        return !(strripos($registered, "+") === false);
    }

    //</editor-fold>

    //<editor-fold desc="OrganizationRegion">
    function setOrganization(string $organization) : self {
        $this->organization = $organization;
        return $this;
    }

    function getOrganization() : string {
        return $this->organization;
    }
    //</editor-fold>

    //<editor-fold desc="TypeRegion">
    function setType(string $type) : self {
        $this->type = $type;
        return $this;
    }

    function getType() : string {
        return $this->type;
    }
    //</editor-fold>

    //<editor-fold desc="NameRegion">
    function setName(string $name) : self {
        $this->name = $name;
        return $this;
    }

    function getName() : string {
        return $this->name;
    }
    //</editor-fold>

    //<editor-fold desc="LanguageRegion">
    function setLanguage(string $language) : self {
        $this->language = mb_strtoupper($language);
        return $this;
    }

    function getLanguage() : string {
        return $this->language;
    }
    //</editor-fold>

    //<editor-fold desc="UrlRegion">
    function setUrl(string $url) : self {
        $this->url = $url;
        return $this;
    }

    function getUrl() : string {
        return $this->url;
    }
    //</editor-fold>

    function parseTypeDefinition(string $typeDefinition) : self {
        $REGISTER_INDEX = 0;
        $ORGANIZ_INDEX = 1;
        $TYPE_INDEX = 2;
        $LANG_INDEX = 3;

        $pattern = "/\"(?<type>[\s\S]+?)\" \"(?<url>[\s\S]+?)\"/";
        $matches = [];

        if(preg_match($pattern, $typeDefinition, $matches)){
            $typeParse = explode("//", $matches['type']);
            if(count($typeParse) > 3){
                $this->setRegistered($this->convertRegisteredToValue($typeParse[$REGISTER_INDEX]))
                    ->setOrganization(trim($typeParse[$ORGANIZ_INDEX]))
                    ->setType(trim(stristr($typeParse[$TYPE_INDEX], ' ', true)))
                    ->setName(trim(stristr($typeParse[$TYPE_INDEX], ' ')))
                    ->setLanguage(trim($typeParse[$LANG_INDEX]));
            }
            $this->setUrl($matches['url']);
        }

        return $this;
    }

    public function __toString()
    {
        $typeStr = (($this->getRegistered()) ? '+' : '-')
            . '//' . $this->getOrganization()
            . '//' . $this->getType() . ' ' . $this->getName()
            . '//' . $this->getLanguage();

        return "\"{$typeStr}\" \"{$this->getUrl()}\"";
    }
}
