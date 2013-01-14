<?php

class Create_Table_Employees {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('employees', function($table) {
            $table->increments('id');
            $table->string('nombre', 128);
            $table->string('apellido', 128);
            $table->string('direccion', 128);
            $table->string('telefono', 12);
            $table->string('celular', 12);
            $table->string('sexo', 1);
            $table->string('estado_civil',20)->default('soltero');
            $table->integer('hijos');
            $table->date('fecha_nacimiento');
            $table->date('fecha_ingereso');
            $table->date('fecha_egreso');
            $table->text('obsevaciones');
            $table->timestamps();
        });         
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('employees');
	}

}