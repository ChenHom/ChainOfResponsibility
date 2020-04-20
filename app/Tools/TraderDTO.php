<?php
namespace App\Tools;

/**
 * 交易傳遞物件
 * @property \Illuminate\Http\Request $request
 * @property \App\Entities\User $user
 */
class TraderDTO
{
    /**
     * @var \Illuminate\Http\Request
     */
    protected $request;

    /**
     * @var \App\Entities\User
     */
    protected $user;

    /**
     * @var array
     */
    protected $sendHeader;

    /**
     * @var array
     */
    protected $sendRequest;

    /**
     * @param \Illuminate\Http\Request $request
     */
    public function __construct($request)
    {
        $this->request = $request;
        $this->user = $request->user('trade');
    }

    public function __get($name)
    {
        if (property_exists($this, $name)) {
            return $this->{$name};
        }
        return null;
    }

    public function __set($name, $value)
    {
        if (property_exists($this, $name)) {
            $this->{$name} = $value;
        }
    }
}
