<?php

require_once 'phing/Task.php';
include_once 'phing/input/InputRequest.php';

class ChooseTask extends Task
{
    private $list;

    private $propertyName;

    private $max;

    private $defaultLast;

    private $choice;

    private $accept;

    private $delimiter = ',';

    public function main()
    {
        if ($this->propertyName === null) {
            throw new BuildException("You must specify a value for propertyName attribute.");
        }

        if ($this->list === null) {
            throw new BuildException("You must specify a value for list attribute.");
        }

        if (! $this->list) {
            $this->log('empty list.', Project::MSG_ERR);
            return false;
        }

        //输出带序号的列表
        $this->log($this->gen($this->list));

        $promptText = '请输入数字序号';

        do {
            $request = new InputRequest($promptText);

            if ($this->defaultLast) {
                $request->setDefaultValue(count($this->choice));
            }

            $request->setPromptChar(':');

            $this->project->getInputHandler()->handleInput($request);

            $proposedValue = $request->getInput();

            $keys = explode(',', $proposedValue);

            foreach ($keys as $key) {
                $key = intval($key);
                if (isset($this->choice[$key-1])) {
                    $this->accept[] = $this->choice[$key-1];
                }
            }
        } while (! $this->accept);

        if ($this->max) {
            $this->accept = array_slice($this->accept, 0, $this->max);
        }

        $this->project->setUserProperty($this->propertyName, implode(',', $this->accept));
    }

    public function setList($list)
    {
        $this->list = (string) $list;
    }

    public function setPropertyName($name)
    {
        $this->propertyName = (string) $name;
    }

    public function setMax($max)
    {
        $this->max = (int) $max;
    }

    public function setDefaultLast($flag)
    {
        $this->defaultLast = (bool) $flag;
    }

    public function setDelimiter($delimiter)
    {
        $this->delimiter = (string) $delimiter;
    }

    private function gen($list)
    {
        $this->choice = explode($this->delimiter, $this->list);
        array_filter($this->choice);

        $output = PHP_EOL;

        if ($this->choice) {
            foreach ($this->choice as $key=>$item) {
                $output .= sprintf("\t%3d) %s %s", $key + 1, $item, PHP_EOL);
            }
        }

        return $output;
    }

}

