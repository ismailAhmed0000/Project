<template>
  <div class="app">
    <div class="container">
      <!-- Left Panel -->
      <div class="left-panel">
        <h1>Patient Registry</h1>
      </div>

      <!-- Right Panel -->
      <div class="right-panel">
        <h3>Registration</h3>
        <form @submit.prevent="handleRegister">
          <div class="form-group">
            <label for="name">Full Name</label>
            <input type="text" id="name" v-model="name" placeholder="Enter your name" required />
          </div>
          <div class="form-group">
            <label for="Date of birth">Date of birth</label>
            <input type="Date" id="dob" v-model="dob" placeholder="mm-dd-yy" required />
          </div>
          <div class="form-group">
            <label for="national_iD">National ID</label>
            <input type="text" id="nationalId" v-model="nationalId" placeholder="ID Card Number" required />


          </div>
           <div class="form-group">
            <label for="Address">Address</label>
            <input type="text" id="address" v-model="address" placeholder="Address" required />
          </div>
           <div class="form-group">
            <label for="Street">Street</label>
            <input type="text" id="street" v-model="street" placeholder="Street Name" required />
          </div>

           <div class="form-group">
               <label for="island">Island</label>
                <select v-model="selectedIsland" id="island" class="dropdown" required>
      <option value="" disabled>Select an island</option>
      <option v-for="island in islands" :key="island.id" :value="island.id">
        {{ island.name }}
      </option>
    </select>
</div>

          <div class="form-actions">
            <button type="submit" class="btn btn-primary">Register</button>
           <button @click="$router.push('/patients')" type="button" class="btn btn-secondary"> Go to Patient List</button>

          </div>
        </form>
      </div>
      </div>
    </div>
  
</template>
<script>

import '../styles/styles.css';
import script from '../scripts/registerPageScript.js';
export default {
    ...script, // Spread the imported script into the component definition
};

</script>

