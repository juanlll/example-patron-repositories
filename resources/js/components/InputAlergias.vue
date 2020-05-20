<template>
    <div>
        <h1>Estudiantes</h1>

        <!-- Nombre Field -->
        <div class="form-group col-sm-3">
            <label>Nombres:</label>
            <input type="text" class="form-control" name="nombre" v-model="estudiante.nombres"/>
        </div>

        <!-- Precio Field -->
        <div class="form-group col-sm-3">
            <label>Apellidos:</label>
            <input type="text" class="form-control" name="precio" v-model="estudiante.apellidos"/>
        </div>

        <!-- Precio Field -->
        <div class="form-group col-sm-3">
            <label>Dirección:</label>
            <input type="text" class="form-control" name="precio" v-model="estudiante.direccion"/>
        </div>

        <!-- Precio Field -->
        <div class="form-group col-sm-3">
            <label>Grado:</label>
            <input type="number" class="form-control" name="precio" v-model="estudiante.grado"/>
        </div>

        <!-- Precio Field -->
        <div class="form-group col-sm-3">
            <label>Edad:</label>
            <input type="number" class="form-control" name="precio" v-model="estudiante.edad"/>
        </div>





        <!-- Precio Field -->
        <div class="form-group col-sm-3" style="border-style:solid; boder-width:2px;" >
         <!-- Precio Field -->
         <div class="form-group col-sm-3">
            <label>Nombre:</label>
            <input type="text" class="form-control" name="precio" v-model="alergia.nombre"/>
        </div>
        <!-- Precio Field -->
        <div class="form-group col-sm-3">
            <label>Cuidados:</label>
            <input type="text" class="form-control" name="precio" v-model="alergia.cuidados"/>
        </div>
        <button @click="agregarAlergia()">Agregar Alergia</button>
        <label>Alergias:</label>
        <table border="1">

            <thead>
                <tr>
                    <th>nombre</th>
                    <th>cuidados</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(estudiante,index) in estudiante.alergias " :key="index">
                    <td>{{alergia.nombre}}</td>
                    <td>{{alergia.cuidados}}</td>
                    <td><button @click="eliminarAlergia(index)">Eliminar</button></td>
                </tr>
            </tbody>
        </table>
    </div>

    <button @click="guardarEstudiante()" v-if="ver_btn1 == 1">Guardar Estudiante</button>
    <button @click="modificarEstudiante()" v-if="ver_btn1 == 2">Guardar Cambios</button>
    <hr>

    <table border="1">

        <thead>
            <tr>
                <th>nombres</th>
                <th>apellidos</th>
                <th>grado</th>
                <th>direccion</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="(estudiante,index) in estudiantes " :key="index">
                <td>{{estudiante.nombres}}</td>
                <td>{{estudiante.apellidos}}</td>
                <td>{{estudiante.grado}}</td>
                <td>{{estudiante.direccion}}</td>
                <td><button @click="verEstudiante(estudiante)">editar</button></td>
            </tr>
        </tbody>
    </table>



    <h1>Acudientes</h1>

    <!-- Nombre Field -->
    <div class="form-group col-sm-3">
        <label>Nombres:</label>
        <input type="text" class="form-control" name="nombre" v-model="acudiente.nombres"/>
    </div>

    <!-- Precio Field -->
    <div class="form-group col-sm-3">
        <label>Apellidos:</label>
        <input type="text" class="form-control" name="precio" v-model="acudiente.apellidos"/>
    </div>

    <!-- Nombre Field -->
    <div class="form-group col-sm-3">
        <label>Dirección:</label>
        <input type="text" class="form-control" name="nombre" v-model="acudiente.direccion"/>
    </div>

    <!-- Precio Field -->
    <div class="form-group col-sm-3">
        <label>Telefono:</label>
        <input type="number" class="form-control" name="precio" v-model="acudiente.telefono"/>
    </div>


    <table border="1">

        <thead>
            <tr>
                <th>nombres</th>
                <th>apellidos</th>
                <th>grado</th>
                <th>direccion</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="(acudiente,index) in acudientes " :key="index">
                <td>{{acudiente.nombres}}</td>
                <td>{{acudiente.apellidos}}</td>
                <td>{{acudiente.grado}}</td>
                <td>{{acudiente.direccion}}</td>
                <td><button @click="verAcudiente(acudiente)">editar</button></td>
            </tr>
        </tbody>
    </table>

    <button @click="guardarAcudiente()" v-if="ver_btn2 == 1">Guardar Acudiente</button>
    <button @click="modificarAcudiente()" v-if="ver_btn2 == 2">Guardar Cambios</button>


</div>
</template>

<script>
import axios from 'axios';

export default {
    created() {
        this.obtenerEstudiantes();
        this.obtenerAcudientes();

    },
    data() {
        return {
            ver_btn1:1,
            ver_btn2:1,
            alergia:{
                nombre:null,
                cuidados:null
            },
            estudiante:{
                id:null,
                nombres:null,
                apellidos:null,
                direccion:null,
                grado:null,
                edad:0,
                alergias:[]
            },
            acudiente:{
              id:null,
              nombres:null,
              apellidos:null,
              direccion:null,
              telefono:null
          },
          acudientes:[],
          estudiantes:[]
      }
  },
  methods: {
    verAcudiente(acu){
        this.acudiente = acu;
        this.ver_btn2 = 2;
    },
    verEstudiante(est){
        this.estudiante = est;
        this.ver_btn1 = 2;
    },
    eliminarAlergia(index){
        this.estudiante.alergias.splice(index,1);
    },
    agregarAlergia(){
        this.estudiante.alergias.push(this.alergia);
    },
    obtenerEstudiantes(){
       axios.get("/api/estudiantes").then(d=>{
        console.log(d);
        this.estudiantes = d.data;
    }).catch(e=>{
        console.log(e);
    });
},  
obtenerAcudientes(){
   axios.get("/api/acudientes").then(d=>{
    console.log(d);
    this.acudientes = d.data;
}).catch(e=>{
    console.log(e);
});
},  
guardarEstudiante(){
    axios.post("/api/estudiantes",this.estudiante).then(d=>{
        console.log(d);
        this.estudiantes.push(d.data);
        this.estudiante = {
            id:null,
            nombres:null,
            apellidos:null,
            direccion:null,
            grado:null,
            edad:0,
            alergias:[]
        };
    }).catch(e=>{
        console.log(e);
    });
},
modificarEstudiante(){
    axios.put("/api/estudiantes/"+this.estudiante.id,this.estudiante).then(d=>{
        console.log(d);
        this.estudiante = {
            id:null,
            nombres:null,
            apellidos:null,
            direccion:null,
            grado:null,
            edad:0,
            alergias:[]
        };
        this.obtenerEstudiantes();
    }).catch(e=>{
        console.log(e);
    });
},
modificarAcudiente(){
    axios.put("/api/acudientes/"+this.acudiente.id,this.acudiente).then(d=>{
        console.log(d);
        this.acudiente = {
          id:null,
          nombres:null,
          apellidos:null,
          direccion:null,
          telefono:null
      };
      this.obtenerEstudiantes();
  }).catch(e=>{
    console.log(e);
});
},
guardarAcudiente(){
    axios.post("/api/acudientes",this.acudiente).then(d=>{
        console.log(d);
        this.acudientes.push(d.data);
        this.acudiente = {
          id:null,
          nombres:null,
          apellidos:null,
          direccion:null,
          telefono:null
      };
  }).catch(e=>{
    console.log(e);
});
}

}
}
</script>

<style lang="scss">

</style>
