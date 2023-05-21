<script>
export default {
    data() {
        return {
            greeting: 'Hello World!',
            csrf: document.head.querySelector('meta[name="csrf-token"]') ? document.head.querySelector('meta[name="csrf-token"]').content : '',
        }
    }
}
</script>

<template>
    <div id="login" class="block">
        <p>Authentication</p>
        <form method="post" action="/auth">
            <input type="hidden" name="_token" :value="csrf">
            <input type="email" placeholder="Email" name="email">
            <input type="password" placeholder="Password" name="password">
            <button type="submit">Login</button>
        </form>
    </div>
</template>

<style>
    #login{
        width: 250px;
        height: 300px;
        position: fixed;
        right: 0;
        left: 0;
        top: 0;
        bottom: 0;
        margin: auto;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    #login > p {
        font-size: 14pt;
        font-weight: 500;
        margin-bottom: 20px;
        color: white;
    }

    #login > form {
        display: flex;
        flex-direction: column;
        width: 80%;
    }

    #login > form > * {
        margin: 5px 0;
        padding: 5px;
    }

    button{
        background: rgb(0 0 0 / 30%);
    }
</style>
