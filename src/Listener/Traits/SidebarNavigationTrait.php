<?php
namespace CrudView\Listener\Traits;

use Cake\Event\Event;

trait SidebarNavigationTrait
{
    /**
     * beforeRender event
     *
     * @param \Cake\Event\Event $event Event.
     * @return void
     */
    public function beforeRenderSidebarNavigation(Event $event)
    {
        $controller = $this->_controller();
        $sidebarNavigation = $this->_getSidebarNavigation();
        $controller->set('disableSidebar', ($sidebarNavigation === false) ? true : false);
        $controller->set('sidebarNavigation', $sidebarNavigation);
    }

    /**
     * Returns the sidebar navigation to show on scaffolded view
     *
     * @return string
     */
    protected function _getSidebarNavigation()
    {
        $action = $this->_action();

        // deprecated check
        if ($action->config('scaffold.disable_sidebar')) {
            return false;
        }

        return $action->config('scaffold.sidebar_navigation');
    }
}
