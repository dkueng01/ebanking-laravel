<template>
    <breeze-authenticated-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="p-8">
            <div class="flex flex-wrap grid grid-rows-4 grid-flow-col gap-4">

                <div class="col-span-9 w-full flex justify-around">
                    <section class="flex w-full">
                        <div class="flex w-full">
                            <div class="relative w-8/12 rounded-2xl shadow-lg w-full overflow-hidden">
                                <div class="flex flex-col w-full">
                                    <header class="flex justify-between p-4 text-white z-20">
                <span class="h-8 w-8">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"/>
                  </svg>
                </span>
                                        <span class="h-8 w-8">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M8.111 16.404a5.5 5.5 0 017.778 0M12 20h.01m-7.08-7.071c3.904-3.905 10.236-3.905 14.141 0M1.394 9.393c5.857-5.857 15.355-5.857 21.213 0"/>
                  </svg>
                </span>
                                    </header>
                                    <div class="flex justify-between px-4 text-gray-100 z-30 mb-4">
                                        <div class="flex flex-col items-start">
                                            <span class="font-thin">NAME</span>
                                            <span class="tracking-widest text-xl">{{
                                                    $page.props.auth.user.name
                                                }}</span>
                                        </div>
                                        <div class="flex flex-col items-end">
                                            <span class="font-thin">IBAN</span>
                                            <span class="tracking-widest text-xl">{{ account.iban }}</span>
                                        </div>
                                    </div>
                                    <div
                                        class="flex items-center justify-between px-4 h-16 z-30 text-white bg-indigo-900">
                                        <div class="flex flex-col items-start">
                                            <span class="text-2xl">€ {{ account.balance }}</span>
                                            <span class="text-sm">Balance</span>
                                        </div>
                                        <div class="flex flex-col items-center">
                                            <div class="relative flex">
                                                <div class="w-8 h-8 opacity-70 bg-white rounded-full"><span></span>
                                                </div>
                                                <div
                                                    class="absolute -left-4 w-8 h-8 opacity-70 bg-white rounded-full">
                                                    <span></span>
                                                </div>
                                            </div>
                                            <div>Mastercard</div>
                                        </div>
                                    </div>
                                    <div
                                        class="absolute opacity-90 top-0 left-0 h-full blur w-full bg-gradient-to-t from-blue-700 to-indigo-400 rounded-2xl">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>

                <div class="row-span-2 col-span-9 flex min-w-full grid grid-col-2">

                    <div class="col-span-1 flex">
                    <div class="pt-2 relative text-gray-600">
                        <form @submit.prevent="searchTransaction">
                            <input
                                class="border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none"
                                type="search" name="search" placeholder="Search" v-model="search">
                            <button type="submit" class="absolute right-0 top-0 mt-5 mr-4">
                                <svg class="text-gray-600 h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                                     xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px"
                                     y="0px"
                                     viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;"
                                     xml:space="preserve"
                                     width="512px" height="512px">
                                    <path
                                        d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z"/>
                                    </svg>
                            </button>
                        </form>
                    </div>
                </div>


                    <div class="flex flex-col min-w-full col-col-1">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Sender
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Empfänger
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Zahlungsreferenz
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Verwendungszweck
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Betrag
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Datum
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                        <tr v-for="transaction of transactions" :key="transaction.id">
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="ml-4">
                                                        <div class="text-sm font-medium text-gray-900">
                                                            {{ transaction.iban_send }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900">{{ transaction.iban_receive }}</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900">{{
                                                        transaction.payment_reference
                                                    }}
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900">{{ transaction.usage }}</div>
                                            </td>
                                            <td v-if="account.iban === transaction.iban_send"
                                                class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                - {{ transaction.amount }} €
                                            </td>
                                            <td v-else class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                {{ transaction.amount }} €
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900">{{ transaction.created_at }}</div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row-span-4 justify-center">
                    <div class="w-full">
                        <form class="bg-gray-50 shadow-md rounded px-8 pt-6 pb-8 mb-4" id="transaction-form"
                              @submit.prevent="createTransaction">
                            <div class="mb-4 bg-white divide-y divide-gray-200">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="iban_receive">
                                    Empfänger IBAN
                                </label>
                                <input
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="iban_receive" type="text" placeholder="IBAN Empfänger" v-model="iban_receive">
                            </div>
                            <div class="mb-4 bg-white divide-y divide-gray-200">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="amount">
                                    Betrag in €
                                </label>
                                <input
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="amount" type="text" placeholder="0.00" v-model="amount">
                            </div>
                            <div class="mb-4 bg-white divide-y divide-gray-200">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="payment_reference">
                                    Zahlungsreferenz
                                </label>
                                <input
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="payment_reference" type="text" placeholder="Zahlungsreferenz"
                                    v-model="payment_reference">
                            </div>
                            <div class="mb-4 bg-white divide-y divide-gray-200">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="usage">
                                    Verwendungszweck
                                </label>
                                <input
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="usage" type="text" placeholder="Verwendungszweck" v-model="usage">
                            </div>
                            <div class="flex items-center justify-between">
                                <button type="submit"
                                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                    Senden
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>


    </breeze-authenticated-layout>
</template>

<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated'

export default {
    data() {
        return {
            transactions: [],
            account: []
        }
    },
    mounted() {
        this.loadData();
    },
    components: {
        BreezeAuthenticatedLayout,
    },
    methods: {
        loadData: function () {
            axios
                .get('http://127.0.0.1:8000/api/accounts/' + this.$page.props.auth.user.id)
                .then(response => (this.account = response.data,
                        axios
                            .get('http://127.0.0.1:8000/api/transactions/account/'+ response.data.iban)
                            .then(response => (this.transactions = response.data))
                ))


        },

        createTransaction: function () {
            let $transaction;
            $transaction = {
                iban_send: this.account.iban,
                amount: this.amount,
                iban_receive: this.iban_receive,
                payment_reference: this.payment_reference,
                usage: this.usage
            };
            axios
                .post("http://127.0.0.1:8000/api/transactions/", $transaction);
        },

        searchTransaction: function () {
            axios
                .get("http://127.0.0.1:8000/api/transactions/search/" + this.search)
                .then(response => (this.transactions = response.data));
        }

    }
}
</script>

<style>
body {
    background: #bce4fa !important;
}
</style>
