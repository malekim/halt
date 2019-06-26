<?php
namespace Halt\Panel;

use DebugKit\DebugPanel;
use Cake\Core\Configure;

/**
 * HaltPanel class extends DebugPanel
 */
class HaltPanel extends DebugPanel
{
    public $plugin = 'Halt';

    /**
     * Shutdown event
     *
     * @param \Cake\Event\Event $event The event
     * @return void
     */
    public function shutdown(\Cake\Event\Event $event)
    {
        $this->_data = [
            'content' => Configure::read('halt')
        ];
    }

    /**
     * Get summary data for the variables panel.
     *
     * @return string
     */
    public function summary()
    {
        if (!isset($this->_data['content'])) {
            return '0';
        }

        return (string)count($this->_data['content']);
    }
}
