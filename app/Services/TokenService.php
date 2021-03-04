<?php

namespace App\Services;

class TokenService
{
    public const DATA_CREATE = 'data:create';
    public const DATA_UPDATE = 'data:update';
    public const DATA_SOFT_DELETE = 'data:soft-delete';
    public const DATA_DELETE = 'data:delete';

    public const USERS_READ = 'users:read';
    public const USERS_CREATE = 'users:create';
    public const USERS_UPDATE = 'users:update';
    public const USERS_SOFT_DELETE = 'users:soft-delete';
    public const USERS_DELETE = 'users:delete';

    // Ability groups
    public const ABILITY_USER = 'user';
    public const ABILITY_MODERATOR = 'moderator';
    public const ABILITY_ADMIN = 'admin';
    public const ABILITY_SUPER_ADMIN = 'super-admin';

    /**
     * @param string $json
     * @return mixed
     */
    public function parse(string $json)
    {
        return json_decode($json);
    }

    /**
     * @param array $data
     * @return false|string
     */
    public function serialize(array $data)
    {
        return json_encode($data, JSON_UNESCAPED_UNICODE);
    }

    /**
     * @param string $lvl
     * @return string[]
     */
    public function getAbilities($lvl = self::ABILITY_USER)
    {
        $abilityUser = [self::DATA_CREATE, self::DATA_UPDATE];
        $abilityModerator = [self::DATA_SOFT_DELETE];
        $abilityAdmin = [self::USERS_READ, self::USERS_CREATE, self::USERS_UPDATE, self::USERS_SOFT_DELETE];
        $abilitySuperAdmin = [self::DATA_DELETE, self::USERS_DELETE];

        switch ($lvl) {
            case self::ABILITY_USER:
                return $abilityUser;
                break;
            case self::ABILITY_MODERATOR:
                return array_merge($abilityUser, $abilityModerator);
                break;
            case self::ABILITY_ADMIN:
                return array_merge($abilityUser, $abilityModerator, $abilityAdmin);
                break;
            case self::ABILITY_SUPER_ADMIN:
                return array_merge($abilityUser, $abilityModerator, $abilityAdmin, $abilitySuperAdmin);
                break;
            default:
                return $abilityUser;
                break;
        }
    }
}
