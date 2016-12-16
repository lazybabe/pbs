<?php
use Svc\Error;

class ErrorController extends BaseController
{
    public function errorAction($exception)
    {
        header('500 Internal Server Error', true, 500);

        try {
            throw $exception;
        } catch (Yaf\Exception\LoadFailed $e) {
            header('HTTP/1.0 404 Not Found', true, 404);

            $this->getView()->display('error/404.html');
        } catch (Doctrine\DBAL\DBALException $e) {
            $logger = Logkit\Logger::ins('_exception');
            $logger->error($e->getMessage());

            $this->getView()->display('error/500.html');
        } catch (Exception $e) {
            $logger = Logkit\Logger::ins('_exception');
            $logger->error($e->getMessage());

            $this->getView()->display('error/500.html');
        }

        return false;
    }

}

