<?php

namespace Mpdf;

use Mpdf\File\LocalContentLoaderInterface;
use Mpdf\File\StreamWrapperChecker;
use Mpdf\Http\ClientInterface;
<<<<<<< HEAD
use Mpdf\Http\Request;
use Mpdf\Log\Context as LogContext;
=======
use Mpdf\Log\Context as LogContext;
use Mpdf\PsrHttpMessageShim\Request;
use Mpdf\PsrLogAwareTrait\PsrLogAwareTrait;
>>>>>>> c3d04cc92fe67578ab00ea1ef48a41df536778b9
use Psr\Log\LoggerInterface;

class AssetFetcher implements \Psr\Log\LoggerAwareInterface
{

<<<<<<< HEAD
=======
	use PsrLogAwareTrait;

>>>>>>> c3d04cc92fe67578ab00ea1ef48a41df536778b9
	private $mpdf;

	private $contentLoader;

	private $http;

<<<<<<< HEAD
	private $logger;

=======
>>>>>>> c3d04cc92fe67578ab00ea1ef48a41df536778b9
	public function __construct(Mpdf $mpdf, LocalContentLoaderInterface $contentLoader, ClientInterface $http, LoggerInterface $logger)
	{
		$this->mpdf = $mpdf;
		$this->contentLoader = $contentLoader;
		$this->http = $http;
		$this->logger = $logger;
	}

	public function fetchDataFromPath($path, $originalSrc = null)
	{
		/**
		 * Prevents insecure PHP object injection through phar:// wrapper
		 * @see https://github.com/mpdf/mpdf/issues/949
		 * @see https://github.com/mpdf/mpdf/issues/1381
		 */
		$wrapperChecker = new StreamWrapperChecker($this->mpdf);

		if ($wrapperChecker->hasBlacklistedStreamWrapper($path)) {
			throw new \Mpdf\Exception\AssetFetchingException('File contains an invalid stream. Only ' . implode(', ', $wrapperChecker->getWhitelistedStreamWrappers()) . ' streams are allowed.');
		}

		if ($originalSrc && $wrapperChecker->hasBlacklistedStreamWrapper($originalSrc)) {
			throw new \Mpdf\Exception\AssetFetchingException('File contains an invalid stream. Only ' . implode(', ', $wrapperChecker->getWhitelistedStreamWrappers()) . ' streams are allowed.');
		}

		$this->mpdf->GetFullPath($path);

		return $this->isPathLocal($path) || ($originalSrc !== null && $this->isPathLocal($originalSrc))
			? $this->fetchLocalContent($path, $originalSrc)
			: $this->fetchRemoteContent($path);
	}

	public function fetchLocalContent($path, $originalSrc)
	{
		$data = '';

		if ($originalSrc && $this->mpdf->basepathIsLocal && $check = @fopen($originalSrc, 'rb')) {
			fclose($check);
			$path = $originalSrc;
			$this->logger->debug(sprintf('Fetching content of file "%s" with local basepath', $path), ['context' => LogContext::REMOTE_CONTENT]);

			return $this->contentLoader->load($path);
		}

		if ($path && $check = @fopen($path, 'rb')) {
			fclose($check);
			$this->logger->debug(sprintf('Fetching content of file "%s" with non-local basepath', $path), ['context' => LogContext::REMOTE_CONTENT]);

			return $this->contentLoader->load($path);
		}

		return $data;
	}

	public function fetchRemoteContent($path)
	{
		$data = '';

		try {

			$this->logger->debug(sprintf('Fetching remote content of file "%s"', $path), ['context' => LogContext::REMOTE_CONTENT]);

<<<<<<< HEAD
			/** @var \Mpdf\Http\Response $response */
=======
			/** @var \Mpdf\PsrHttpMessageShim\Response $response */
>>>>>>> c3d04cc92fe67578ab00ea1ef48a41df536778b9
			$response = $this->http->sendRequest(new Request('GET', $path));

			if ($response->getStatusCode() !== 200) {

				$message = sprintf('Non-OK HTTP response "%s" on fetching remote content "%s" because of an error', $response->getStatusCode(), $path);
				if ($this->mpdf->debug) {
					throw new \Mpdf\MpdfException($message);
				}

				$this->logger->info($message);

				return $data;
			}

			$data = $response->getBody()->getContents();

		} catch (\InvalidArgumentException $e) {
			$message = sprintf('Unable to fetch remote content "%s" because of an error "%s"', $path, $e->getMessage());
			if ($this->mpdf->debug) {
<<<<<<< HEAD
				throw new \Mpdf\MpdfException($message, 0, $e);
=======
				throw new \Mpdf\MpdfException($message, 0, E_ERROR, null, null, $e);
>>>>>>> c3d04cc92fe67578ab00ea1ef48a41df536778b9
			}

			$this->logger->warning($message);
		}

		return $data;
	}

	public function isPathLocal($path)
	{
<<<<<<< HEAD
		return strpos($path, '://') === false; // @todo More robust implementation
	}

	public function setLogger(LoggerInterface $logger)
	{
		$this->logger = $logger;
=======
		return str_starts_with($path, 'file://') || strpos($path, '://') === false; // @todo More robust implementation
>>>>>>> c3d04cc92fe67578ab00ea1ef48a41df536778b9
	}

}
