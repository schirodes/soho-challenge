<template>
    <div class="d-flex flex-flow-c jc-center align-center">

        <!-- Carga/Edit -->
        <form @submit="saveProject($event)" class="d-flex w-100 jc-center flex-flow-c align-center">
            <h1 class="titulo">Nuevo proyecto destacado</h1>
            <div class="input-block my-10">
                <label class="mx-15 w-33">Título</label><input v-model="proyecto.titulo" class="w-66" type="text" required />
            </div>
            <div class="input-block my-10">
                <label class="mx-15 w-33">Texto</label><textarea v-model="proyecto.parrafo" class="w-66" required />
            </div>
            <div class="input-block my-10">
                <label class="mx-15 w-33">Color: título</label><input v-model="proyecto.color_titulo" class="w-66" type="color" required />
            </div>
            <div class="input-block my-10">
                <label class="mx-15 w-33">Color: logo</label><input v-model="proyecto.color_logo" class="w-66" type="color" required />
            </div>
            <div class="input-block my-10">
                <label class="mx-15 w-33">Color: background</label><input v-model="proyecto.color_background" class="w-66" type="color" required />
            </div>
            <div class="input-block my-10">
                <label class="mx-15 w-33">Color: button</label><input v-model="proyecto.color_button" class="w-66" type="color" required />
            </div>
            <div class="input-block my-10">
                <label class="mx-15 w-33">Color: button text</label><input v-model="proyecto.color_button_text" class="w-66" type="color" required />
            </div>
            <div class="input-block my-10">
                <label class="mx-15 w-33">Color: parrafo</label><input v-model="proyecto.color_parrafo" class="w-66" type="color"  required />
            </div>
            <div class="input-block my-10">
                <label class="mx-15 w-33">Color: hash</label><input v-model="proyecto.color_hash" class="w-66" type="color" required />
            </div>
            <div class="input-block my-10">
                <label class="mx-15 w-33">Hashes</label><input v-model="proyecto.hashes" class="w-66" type="text" placeholder="Separados por coma (ux, ui, ...)" required />
            </div>
            <div class="input-block my-10">
                <label class="mx-15 w-33">Proyecto</label><input name="display" @change="fileChange($event)" class="w-66" type="file" required />
            </div>
            <div class="input-block my-10">
                <label class="mx-15 w-33">Logo</label><input name="logo" @change="fileChange($event)" class="w-66" type="file" required />
            </div>

            <div class="input-block my-10">
                <button type="submit">Enviar</button>
            </div>
            
        </form>
    </div>
</template>

<script>
export default {
    data(){
        return{
            proyecto:{
                id:null,
                titulo:null,
                parrafo:null,
                color_titulo:"#000000",
                color_background:"#000000",
                color_button:"#000000",
                color_button_text:"#000000",
                color_parrafo:"#000000",
                color_hash:"#000000",
                color_logo:"#000000",
                hashes:null,
                display:null,
                logo:null,
            }
        }
    },
    methods:{
        fileChange(event){
            this.proyecto[event.target.name] = event.target.files[0];
        },
        saveProject(event){
            event.preventDefault();
            const config = { headers: { 'content-type': 'multipart/form-data' } };
            
            let frmData = new FormData();
            
            if(this.id)
                frmData.append("id",this.proyecto.id);

            frmData.append("titulo",this.proyecto.titulo);
            frmData.append("parrafo",this.proyecto.parrafo);
            frmData.append("color_titulo",this.proyecto.color_titulo);
            frmData.append("color_background",this.proyecto.color_background);
            frmData.append("color_button",this.proyecto.color_button);
            frmData.append("color_button_text",this.proyecto.color_button_text);
            frmData.append("color_parrafo",this.proyecto.color_parrafo);
            frmData.append("color_hash",this.proyecto.color_hash);
            frmData.append("color_logo",this.proyecto.color_logo);
            frmData.append("hashes",this.proyecto.hashes);
            frmData.append("display",this.proyecto.display);
            frmData.append("logo",this.proyecto.logo);

            this.axios.post("/destacados/save", frmData, config);
        }
    }
}
</script>