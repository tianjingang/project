<?php
/**
 * @brief ��̬��������ͼ��
 */
class Thumb
{
	//����ͼ·��
	public static $thumbDir = "runtime/_thumb/";

	/**
	 * @brief ��ȡ����ͼ����·��
	 */
	public static function getThumbDir()
	{
		return IWeb::$app->getBasePath().self::$thumbDir;
	}

	/**
	 * @brief ��������ͼ
	 * @param string $imgSrc ͼƬ·��
	 * @param int $width ͼƬ���
	 * @param int $height ͼƬ�߶�
	 * @return string WEBͼƬ·������
	 */
    public static function get($imgSrc,$width=100,$height=100)
    {
    	if($imgSrc == '')
    	{
    		return '';
    	}

		//Զ��ͼƬ
		if(strpos($imgSrc,"http") === 0)
		{
			$sourcePath = $imgSrc;
			$urlArray   = parse_url($imgSrc);
			$dirname    = dirname($urlArray['path']);
		}
		//����ͼƬ
		else
		{
			$sourcePath = IWeb::$app->getBasePath().$imgSrc;
			$dirname    = dirname($imgSrc);
		}

		//����ͼ�ļ���
		$preThumb      = "{$width}_{$height}_";
		$thumbFileName = $preThumb.basename($imgSrc);

		//����ͼĿ¼
		$thumbDir    = self::getThumbDir().trim($dirname,"/")."/";
		$webThumbDir = self::$thumbDir.trim($dirname,"/")."/";
		if(is_file($thumbDir.$thumbFileName) == false)
		{
			IImage::thumb($sourcePath,$width,$height,$preThumb,$thumbDir);
		}
		return $webThumbDir.$thumbFileName;
    }
}