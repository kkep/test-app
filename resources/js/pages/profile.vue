<script setup>
//import Layout from '@/Layouts/Authenticated.vue';
import { Head } from '@inertiajs/inertia-vue3';
import axios from 'axios';
</script>

<template>
    <Head title="User Profile" />

    <Layout>
        <div class="block card">
            <div>
                <img src="/img/avatar.png" alt="">
            </div>
            <div class="info">
                <div>
                    <p class="name">{{ user.name }}</p>
                    <p>{{ user.email }}</p>
                </div>
                <div class="logout">
                    <a href="/logout">Logout</a>
                </div>

            </div>
        </div>

        <div class="fields block">
            <div>
                <label for="name">Name</label>
                <input v-model="user.name" id="name" name="name" maxlength="255" required>
            </div>
            <div>
                <label for="company">Company</label>
                <input id="company" name="company" v-model="user.company" maxlength="255">
            </div>
            <div>
                <label for="country">Country</label>
                <select v-model="user.country_id" :value="user.country_id" id="country">
                    <option :value="country.id" v-for="country in countries">{{ country.name }}</option>
                </select>
            </div>
            <div>
                <label for="department">Department</label>
                <select id="department" v-model="department_id" :value="department_id" @change="user.job_id = null">
                    <option
                        :disabled="department.failed_at"
                        :value="department.id"
                        v-for="department in departments"
                    >{{ department.name }}</option>
                </select>
            </div>
            <div>
                <label for="job">Job</label>
                <select v-model="user.job_id" id="job" :value="user.job_id">
                    <option
                        :disabled="job.failed_at"
                        :value="job.id"
                        v-for="job in jobs.filter(j => j.department_id === department_id)"
                    >{{ job.name }}</option>
                </select>
            </div>
            <div class="buttons">
                <button class="cancel" :disabled="!hasChanged" @click="reset()">Cancel</button>
                <button class="save" :disabled="!hasChanged" @click="save()">Save</button>
            </div>
        </div>

    </Layout>
</template>
<style>
    layout{
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;

    }
    .block{
        width: 400px;
        padding: 20px;
        margin-top: 20px;
    }

    .card{
        display: flex;
        flex-direction: row;
    }

    .card .info{
        display: inline-flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        width: -webkit-fill-available;
        text-align: center;
    }

    .card .info > div{
        height: -webkit-fill-available;
        width: inherit;
        align-items: center;
        justify-content: center;
        display: inline-flex;
        flex-direction: column;
    }

    .card .info > div.logout{
        height: auto;
        align-items: end;
    }

    .card .name{
        font-size: 16pt;
    }

    a{
        padding: 5px;
        background: rgb(0 0 0 / 31%);
        color: rgb(255 255 255 / 55%);
        border-radius: 5px;
    }

    img{
        width: 150px;
        height: 150px;
        border-radius: 100%;
    }

    .fields > div{
        margin: 10px 0;
        display: flex;
        flex-direction: row;
    }
    .fields > div > * {
        width: -webkit-fill-available;
        display: inline-flex;
        color: white;
    }
    .fields > div > label {
        width: 120px;
        display: inline-flex;
    }
    .fields > div > input, select {
        padding: 5px;
    }
    .fields > .buttons{
        display: flex;
        justify-content: space-evenly;
        margin-top: 30px;
    }
    .buttons button{
        width: 80px;
        padding: 5px;
        text-align: center;
        display: inline;
    }
    .buttons button.cancel{
        background: #fd2727;
    }
    .buttons button.save{
        background: #298b29;
    }
    .buttons button:disabled{
        color: silver;
        background: rgb(0 0 0 / 30%) !important;
    }
</style>
<script>

import axios from "axios";

export default {
    props: ['user', 'departments', 'jobs', 'countries'],
    data() {
        return {
            originalForm: {...this.user},
            department_id: this.jobs.find(j => j.id === this.user.job_id)?.department_id
        }
    },
    methods: {
        reset: function() {
            // что-то не работает
            //this.user.name = {...this.originalForm};

            Object.keys(this.user)
                .forEach(field => this.user[field] = this.originalForm[field]);
        },
        save: function() {
            axios.post('/save', this.user).then((resp) => {
                if (resp.data?.success) {
                    this.originalForm = {...this.user};
                }
            })
        }
    },
    computed: {
        hasChanged () {
            return Object.keys(this.user).some(field => this.user[field] !== this.originalForm[field])
        }
    }
}
</script>
