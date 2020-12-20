<?php

trait sampleModuleHelperEvent
{
    /**
     * @param $eventName
     * @param array $data
     * @return array
     */
    public function invokeEvent($eventName, $data = [])
    {
        $this->modx->event->returnedValues = null;
        $response = [
            'eventOutput' => $this->modx->invokeEvent($this::PKG_NAMESPACE . $eventName, $data),
            'returnedValues' => $this->modx->event->returnedValues ?? [],
        ];
        return $response;
    }
}
