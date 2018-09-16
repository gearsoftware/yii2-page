<?php

/**
 * @package   Yii2-Page
 * @author    José Peña <joepa37@gmail.com>
 * @link https://plus.google.com/+joepa37/
 * @copyright Copyright (c) 2018 José Peña
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @version   1.0.0
 */

use gearsoftware\db\TranslatedMessagesMigration;

class m170731_061735_i18n_es_core_page extends TranslatedMessagesMigration
{
	public function getLanguage()
	{
		return 'es-ES';
	}

	public function getCategory()
	{
		return 'core/page';
	}

	public function getTranslations()
	{
		return [
			'Page' => 'Página',
			'Pages' => 'Páginas',
			'Create Page' => 'Crear página',
		];
	}
}
