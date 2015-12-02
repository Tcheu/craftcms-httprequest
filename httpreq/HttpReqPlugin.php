<?php
namespace Craft;

class HttpReqPlugin extends BasePlugin
{
	private $_name = 'HTTP Request';
	private $_description = 'Create and send HTTP requests from templates and retrieve the response, in JSON or plain text.';
	private $_developer = 'Tcheu!';
	private $_developerUrl = 'http://tcheu.be';
	private $_documentationUrl = 'https://github.com/Tcheu/craftcms-httprequest';
	private $_releaseFeedUrl = 'https://github.com/Tcheu/craftcms-httprequest';
	private $_version = '1.1.0';

	public function getName()
	{
		return Craft::t( $this->_name );
	}

    public function getDescription()
    {
        return $this->_description;
    }

    public function getDocumentationUrl()
    {
        return $this->_documentationUrl;
    }

	public function getVersion()
	{
		return $this->_version;
	}

	public function getDeveloper()
	{
		return $this->_developer;
	}

	public function getDeveloperUrl()
	{
		return $this->_developerUrl;
	}

    public function getReleaseFeedUrl()
    {
        return $this->_releaseFeedUrl;
    }
}