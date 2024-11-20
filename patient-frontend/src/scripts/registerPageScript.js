

import '../styles/styles.css';

import axios from 'axios';
export default {
  data() {
    return {
      name: '',
      dob: '',
      nationalId: '', 
      address:'',
      street:'',
      selectedIsland: '', // Holds the selected island ID
      islands: [], // Array to store the fetched islands
    };
  },
methods: {
  // Fetch islands from the backend
  async fetchIslands() {
    try {
      const baseUrl = import.meta.env.VITE_API_BASE_URL || 'http://127.0.0.1:8000'; // Use import.meta.env for Vite
      const response = await axios.get(`${baseUrl}/api/islands`);
      this.islands = response.data; // Populate the islands array
      console.log('Islands fetched successfully:', this.islands);
    } catch (error) {
      console.error('Error fetching islands:', error.message);
      alert('Failed to fetch islands. Please try again.');
    }
  },
  //date 
  formatDate(date) {
    if (!date) return ''; // Handle empty date
    const d = new Date(date);
    const year = d.getFullYear();
    const month = String(d.getMonth() + 1).padStart(2, '0'); // Ensure 2-digit month
    const day = String(d.getDate()).padStart(2, '0'); // Ensure 2-digit day
    return `${year}-${month}-${day}`;
  },


  // Handle the registration process
  async handleRegister() {
 console.log('National ID:', this.nationalId);

    console.log('DOB:', this.dob);
  

    // Validate that an island is selected
    if (!this.selectedIsland) {
      alert('Please select an island!');
      return;
    }
console.log('DOB before payload:', this.dob);

    // Prepare the registration payload
    const payload = {
      name: this.name,
      dob: this.dob,
      national_id: this.nationalId,
      city: this.address,
      street: this.street,
      selected_island: this.selectedIsland,
    };
     console.log('Payload being sent to API:', payload); 

     // Save the patient data in localStorage
  const patients = JSON.parse(localStorage.getItem("patients")) || [];
  patients.push(payload);
  localStorage.setItem("patients", JSON.stringify(patients));

    try {
      const baseUrl = import.meta.env.VITE_API_BASE_URL || 'http://127.0.0.1:8000'; // Use dynamic base URL
      const response = await axios.post(`${baseUrl}/api/patients`, payload);

      if (response.status === 201) {
        alert('Patient registered successfully!');
        console.log('Registration response:', response.data);

        // Reset form fields after successful registration
        this.name = '';
        this.dob = '';
        this.nationalId = '';
        this.address = '';
        this.street = '';
        this.selectedIsland = '';
      } else {
        console.error('Unexpected response status:', response.status);
        alert('Failed to register patient. Please try again.');
      }
    } catch (error) {
      console.error('Error registering patient:', error.message);
      alert('Error registering patient. Please check your inputs and try again.');
    }
  },

  // Navigate to the patient list page
  goToPatientList() {
    this.$router.push('/patients');
  },
},

mounted() {
  this.fetchIslands(); // Fetch islands when the component is mounted
},

};

