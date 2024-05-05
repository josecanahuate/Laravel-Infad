<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function adminlte_image() {
        //metodo para mostrar imagen
        return 'https://picsum.photos/300/300'; //ejemplo modificar por id del usuario
    }

    public function adminlte_desc() {
        //mostrar rol de usuario
        return "Administrador"; //ejemplo - modificar por id y rol del usuario
    }

    public function adminlte_profile_url(){
        return 'user/profile'; //ejemplo - modificar por id del usuario
    }


    //relacion user con datos personales
    public function datosPersonales()
    {
        return $this->hasOne(DatoPersonal::class);
    }

    //relacion users a idiomas
    public function idiomas()
    {
    return $this->hasMany(Idioma::class);
    }

    public function otrasPublicaciones()
    {
    return $this->hasMany(OtraPublicacion::class);
    }

    //relacion users a experiencialaboral
    public function experienciasLaborales()
    {
        return $this->hasMany(ExperienciaLaboral::class);
    }

    //relacion users a participacioncongresos
    public function participacionCongresos()
    {
    return $this->hasMany(ParticipacionCongreso::class);
    }


    //relacion users a preparacionConstante
    public function preparacionConstantes()
    {
        return $this->hasMany(PreparacionConstante::class);
    }

    public function preparacionesFormales()
    {
    return $this->hasMany(PreparacionFormal::class);
    }

    public function proyectosInscritos()
    {
    return $this->hasMany(ProyectoInscrito::class);
    }

    public function seminariosDictados()
    {
    return $this->hasMany(SeminarioDictado::class);
    }

    public function tesisAsesoradas()
    {
    return $this->hasMany(TesiAsesorada::class);
    }

    // User.php
    public function gradoAcademico()
    {
        return $this->belongsTo(GradoAcademico::class);
    }

    public function gradoAcademicoPreparacionFormal()
    {
        return $this->belongsTo(GradoAcademicoPreparacionFormal::class);
    }
/* 
   public function gradoAcademicoPreparacionFormal()
    {
        return $this->belongsTo(GradoAcademicoPreparacionFormal::class, 'id_grado_academico');
    } */


   /*  public function gradoAcademico()
    {
        return $this->belongsTo(GradoAcademico::class, 'id_grado_academico');
    } */
}
