<template>
    <div class="app">
        <div class="container">
         <!-- Right Panel (Patient List) -->
            <div class="right-panel">
                <h3>Patient List</h3>
                <table class="patient-table">
                    <thead>
                        <tr>
                            <th>Full Name</th>
                            <th>DOB</th>
                            <th>National ID</th>
                            <th>Address</th>
                            <th>Street</th>
                            <th>Island</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(patient, index) in patients" :key="index">
                            <td>{{ patient.name }}</td>
                            <td>{{ patient.dob }}</td>
                            <td>{{ patient.national_id }}</td>
                            <td>{{ patient.city }}</td>
                            <td>{{ patient.street }}</td>
                            <td>{{ patient.selected_island }}</td>
                            <td class="actions">
                                <button @click="editPatient(index)" class="btnl btn-update">Update</button>
                                <button @click="deletePatient(index)" class="btnl btn-delete">Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div>
                    <button @click="$router.push('/register')" type="button" class=" btn btn-secondary">
                       Go back to Register</button>
                </div>
            </div>
            <!-- Left Panel -->
            <div class="left-panel">
                <h1>DASHBOARD</h1>
            </div>

        </div>
    </div>
</template>

<script>

import '../styles/styles.css';
import script from '../scripts/listPageScript.js';
export default {
    ...script, // Spread the imported script into the component definition
};
</script>

