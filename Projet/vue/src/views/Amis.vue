<template>
  <PageComponent titre="Amis">
    <div class="amis">
      <div class="send-request">
        <h2>Envoyer une demande d'ami</h2>
        <input v-model="newFriendId" placeholder="Nom de l'utilisateur" />
        <button @click="sendFriendRequest">Envoyer</button>
      </div>

      <div class="friend-requests">
        <h2>Demandes d'amis reçues</h2>
        <ul>
          <li v-for="request in friendRequests" :key="request.id">
            {{ request.username }}
            <button @click="acceptFriendRequest(request.id)">Accepter</button>
            <button @click="declineFriendRequest(request.id)">Décliner</button>
          </li>
        </ul>
      </div>

      <div class="friends-list">
        <h2>Liste d'amis</h2>
        <ul>
          <li v-for="friend in friends" :key="friend.id">
            {{ friend.username }}
          </li>
        </ul>
      </div>
    </div>
  </PageComponent>
</template>

<script>
export default {
  data() {
    return {
      newFriendId: "",
      friendRequests: [], // Liste des demandes d'amis reçues
      friends: [], // Liste d'amis actuels
    };
  },
  methods: {
    async sendFriendRequest() {
      try {
        await this.$axios.post("/api/friendships", {
          recipient_id: this.newFriendId,
        });
        alert("Demande d'ami envoyée avec succès.");
        this.newFriendId = ""; // Réinitialiser le champ après l'envoi
      } catch (error) {
        alert("Erreur lors de l'envoi de la demande d'ami.");
      }
    },
    async acceptFriendRequest(requestId) {
      try {
        await this.$axios.post(`/api/friendships/${requestId}/accept`);
        this.fetchFriendRequests(); // Recharger les demandes d'amis
        this.fetchFriends(); // Recharger la liste d'amis
      } catch (error) {
        alert("Erreur lors de l'acceptation de la demande d'ami.");
      }
    },
    async declineFriendRequest(requestId) {
      try {
        await this.$axios.post(`/api/friendships/${requestId}/decline`);
        this.fetchFriendRequests(); // Recharger les demandes d'amis
      } catch (error) {
        alert("Erreur lors du refus de la demande d'ami.");
      }
    },
    async fetchFriendRequests() {
      try {
        const response = await this.$axios.get("/api/friendships/requests");
        this.friendRequests = response.data;
      } catch (error) {
        alert("Erreur lors de la récupération des demandes d'amis.");
      }
    },
    async fetchFriends() {
      try {
        const response = await this.$axios.get("/api/friends");
        this.friends = response.data;
      } catch (error) {
        alert("Erreur lors de la récupération de la liste d'amis.");
      }
    },
  },
  created() {
    this.fetchFriendRequests();
    this.fetchFriends();
  },
};
</script>

<style></style>
