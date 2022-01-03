<?php
/* ************************************************************************************************ */
/*                                                                                                  */
/*                                                        :::   ::::::::   ::::::::  :::::::::::    */
/*   Newsletter.php                                    :+:+:  :+:    :+: :+:    :+: :+:     :+:     */
/*                                                      +:+         +:+        +:+        +:+       */
/*   By: magoumi <magoumi@student.1337.ma>             +#+      +#++:      +#++:        +#+         */
/*                                                    +#+         +#+        +#+      +#+           */
/*   Created: 2022/01/03 10:46:21 by magoumi         #+#  #+#    #+# #+#    #+#     #+#             */
/*   Updated: 2022/01/03 10:46:21 by magoumi      ####### ########   ########      ###.ma           */
/*                                                                                                  */
/* ************************************************************************************************ */

namespace   Model;

/**
 * Class Newsletter
 */

use Simfa\Framework\Db\DbModel;

class Newsletter extends DbModel
{
	protected ?int $entityID = null;
	protected ?string $email = NULL;
	protected ?string $token = NULL;
	protected ?int $status = NULL;

	/**
	 * @return array[]
	 */
	public function rules(): array
	{
		return [
		    'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
			'token' => [self::RULE_REQUIRED,[self::RULE_MAX, 'max' => 255]],
			'status' => [self::RULE_REQUIRED]
		];
	}
}
