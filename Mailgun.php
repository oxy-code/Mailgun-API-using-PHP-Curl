<?php
/* 
 * Mailgun API
 * @author Velu
 * @email velu_developer@yahoo.com
 * @docs http://documentation.mailgun.com/api_reference.html
 * @version 2.0
 * @description This API is built by PHP_CURL standards
 */
class Mailgun {
	protected $api_url = "https://api.mailgun.net/v2";
	protected $api_key = null;
	protected $domain = null;
	/* 
	 * Function __construct()
	 * Used to setup the api key and domain
	 * @param api_key, domain
	 * @author Velu
	 */
	public function __construct($api_key, $domain) {
		$this->api_key = $api_key;
		$this->domain = $domain;
	}
	/* 
	 * Function getBounces()
	 * Used to get the bounced list
	 * @param params
	 * @return result
	 * @author Velu
	 */
	public function getBounces($params = null) {
		$url = $this->api_url."/".$this->domain."/bounces";
		if ($params) {
			$url .= '?'.http_build_query($params);
		}
		return $this->_buildResponse($url);
	}
	/* 
	 * Function getMessages()
	 * Used to get the bounced list
	 * @param params
	 * @return result
	 * @author Velu
	 */
	public function getMessages($params = null) {
		$url = $this->api_url."/".$this->domain."/messages";
		if ($params) {
			$url .= '?'.http_build_query($params);
		}
		return $this->_buildResponse($url);
	}
	/* 
	 * Function getDomains()
	 * Used to get the domains list
	 * @param params
	 * @return result
	 * @author Velu
	 */
	public function getDomains($params = null) {
		$url = $this->api_url."/domains";
		if ($params) {
			$url .= '?'.http_build_query($params);
		}
		return $this->_buildResponse($url);
	}
	/* 
	 * Function getUnsubscribes()
	 * Used to get the bounced list
	 * @param params
	 * @return result
	 * @author Velu
	 */
	public function getUnsubscribes($params = null) {
		$url = $this->api_url."/".$this->domain."/unsubscribes";
		if ($params) {
			$url .= '?'.http_build_query($params);
		}
		return $this->_buildResponse($url);
	}
	/* 
	 * Function getComplaints()
	 * Used to get the spam complaints list
	 * @param params
	 * @return result
	 * @author Velu
	 */
	public function getComplaints($params = null) {
		$url = $this->api_url."/".$this->domain."/complaints";
		if ($params) {
			$url .= '?'.http_build_query($params);
		}
		return $this->_buildResponse($url);
	}
	/* 
	 * Function getStats()
	 * Used to get the statistics report
	 * @param params
	 * @return result
	 * @author Velu
	 */
	public function getStats($params = null) {
		$url = $this->api_url."/".$this->domain."/stats";
		if ($params) {
			$url .= '?'.http_build_query($params);
		}
		return $this->_buildResponse($url);
	}
	/* 
	 * Function get()
	 * Used to get the result from your custom url
	 * @param url, params
	 * @return result
	 * @author Velu
	 */
	public function get($url = null, $params = null) {
		$url = $this->api_url.$url;
		if ($params) {
			$url .= '?'.http_build_query($params);
		}
		return $this->_buildResponse($url);
	}
	/* 
	 * Function _buildResponse()
	 * Used to get the responses
	 * @param url
	 * @return result
	 * @author Velu
	 */
	protected function _buildResponse($url) {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($ch, CURLOPT_USERPWD, "api:".$this->api_key);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		$result = json_decode(curl_exec($ch));
		curl_close($ch);
		return $result;
	}
}
