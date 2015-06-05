<?php
/**
 * @author awei.tian
 * date: 2013-8-29
 * 说明: 路由器
 * 
 * 需要路由规则(把HTTPREQUEST怎么变成pmcai)
 * 路由规则目前有一种，正则
 */
require_once 'lib/tianv2/route/route.php';
class router{
	protected $_useDefaultRoutes = true;
	private $trace = array();
	/**
	 * Array of routes to match against
	 * @var array
	 */
	protected $_routes = array();
	protected $_currentRoute = "";
	public function __construct(){

	}
	public function getHttpRequest(){
		return $this->request;
	}
	/**
	 * Add default routes which are used to mimic basic router behaviour
	 * @return this
	 */
	public function addDefaultRoutes(){
		if (!$this->hasRoute('default')) {
			require_once 'routes/default/defaultRoute.php';
			$p = tian::getDefPreMask();
			$compat = new defaultRoute($p."ca");
			$this->_routes = array('default' => $compat) + $this->_routes;
		}
		return $this;
	}
	/**
	 * Add route to the route chain
	 *
	 * @param  string $name       Name of the route
	 * @param  IRoute $route      Instance of the route
	 * @return Router
	 */
	public function addRoute($name, IRoute $route){
		$this->_routes[$name] = $route;
		return $this;
	}
	
	/**
	 * Check if named route exists
	 *
	 * @param  string $name Name of the route
	 * @return boolean
	 */
	public function hasRoute($name){
		return isset($this->_routes[$name]);
	}
	
	/**
	 * Remove a route from the route chain
	 *
	 * @param  string $name Name of the route
	 * @return this
	 */
	public function removeRoute($name){
		if (isset($this->_routes[$name])){
			unset($this->_routes[$name]);
		}
		return $this;
	}
	
	/**
	 * Retrieve a named route
	 * empty return currentRoute
	 * @param string $name Name of the route
	 * @throws routerException
	 * @return IRoute
	 */
	public function getRoute($name=""){
		if(empty($name))$name=$this->getMatchedRouteName();
		if (isset($this->_routes[$name])) {
			return $this->_routes[$name];
		}else{
			tian::throwException("73b3");
			return null;
		}
	
		
	}
	/**
	 * Remove all standard default routes
	 *
	 * @return this
	 */
	public function removeDefaultRoutes(){
		$this->_useDefaultRoutes = false;
	
		return $this;
	}
	
	/**
	 * 
	 * @param string $url 用户请求URL
	 * @return route
	 */
	public function route($url=null,$dispatcherName=""){
		if(!is_string($url)){
			if(is_null(tian::$requiest)){
				tian::throwException("7392");
				return false;
			}
			$url = tian::$requiest->requestUri();
		}
		if ($this->_useDefaultRoutes) {
			$this->addDefaultRoutes();
		}
		// Find the matching route
		$routeMatched = false;
		$matchedRoute = null;
		foreach (array_reverse($this->_routes, true) as $name => $route) {
			$this->trace[] = $name." route is matching ".$url;
			if ($route->match($url)) {
				$this->trace[] = "<font color=green>".$name." route is matched ".$url."</font>";
				$this->_currentRoute = $name;
				$routeMatched        = true;
				$matchedRoute		 = $route;
				break;
			}else{
				$this->trace[] = "<font color=red>".$name." route is not matched ".$url."</font>";
			}
		}
	
		if (!$routeMatched) {
			tian::throwException("73b3");
			return ;
		}
		return $matchedRoute;
	}
	/**
	 * @return string
	 */
	public function getMatchedRouteName(){
		return $this->_currentRoute;
	}
	public function debug(){
		echo implode("<br>", $this->trace);
	}
}