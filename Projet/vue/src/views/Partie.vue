<template>
  <PageComponent titre="Parties">
    <div class="p-4">
      <!-- Formulaire de création de partie -->
      <div class="mb-8 p-4 border-2 rounded-lg shadow-md">
        <form @submit.prevent="submitForm" class="space-y-4">
          <div>
            <label for="is_public" class="block text-sm font-medium text-gray-700">La partie est-elle publique ?</label>
            <select id="is_public" v-model="formData.is_public"
              class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
              <option value="true">Oui</option>
              <option value="false">Non</option>
            </select>
          </div>
          <div>
            <label for="number_of_players" class="block text-sm font-medium text-gray-700">Nombre de joueurs max
              :</label>
            <select id="number_of_players" v-model="formData.max_players"
              class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
              <option value="2">2</option>
              <option value="3">3</option>
            </select>
          </div>
          <button type="submit"
            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Créer la partie
          </button>
        </form>
      </div>

      <!-- Liste des parties existantes -->
      <div class="p-4 border-2 rounded-lg shadow-md">
        <h2 class="mb-4 text-lg leading-6 font-medium text-gray-900">Liste des parties</h2>
        <div class="flow-root">
          <ul role="list" class="divide-y divide-gray-200">
            <li v-for="partie in parties" :key="partie.id" class="py-4">
              <div class="flex space-x-3">
                <div class="text-sm font-medium text-gray-500">
                  ID: {{ partie.id }}, Nombre max de joueurs: {{ partie.max_players }}, Commencée: {{
          started ? 'Oui' : 'Non' }}
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </PageComponent>
</template>

<script>
import axios from 'axios';
import store from '../store/index1.js';

export default {
  data() {
    return {
      "formData": {
        number_of_players: 2,
        is_public: true,
      },
      parties: [],
    };
  },
  created() {
    this.fetchParties();
  },
  methods: {
    submitForm() {
      // Structurez les données comme attendu par votre API Laravel
      const dataToSend = {
        partie: this.formData,

      };
      axios.post('http://localhost:8000/api/partie/create', dataToSend, {
        headers: {
          'Authorization': sessionStorage.getItem('TOKEN'), // Assurez-vous d'inclure le token d'authentification
        }
      })
        .then(() => {
          this.fetchParties(); // Recharge la liste des parties après la création
          this.formData = { number_of_players: 2, is_public: true }; // Réinitialise le formulaire
          alert('Partie créée avec succès!');
        })
        .catch(error => {
          console.error('Erreur:', error.response);
        });
    },

    fetchParties() {
      axios.get('http://localhost:8000/api/parties')
        .then(response => {
          this.parties = response.data;
        })
        .catch(error => {
          console.error('Erreur lors de la récupération des parties:', error.response);
        });
    },
  },
};
</script>
