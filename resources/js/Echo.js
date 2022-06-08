import Vue from 'vue'

window.Echo.channel('laravel_database_post-created')
    //.listen('.App\\Events\\PostCreated', (e) => {
    .listen('PostCreated', (e) => {
        //console.log(e.post);
        Vue.$vToastify.success(`Título do post ${e.post.title}`, 'Novo Post')
    });
