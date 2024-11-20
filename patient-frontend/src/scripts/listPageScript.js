
import '../styles/styles.css';
export default {
  
  data() {
    return {
      patients: [], // Local copy of patients for manipulation
    };
  },
  methods: {
    // Emit event to update patient
    editPatient(index) {
      this.$emit("edit-patient", index);
    },
    // Delete patient from the local copy 
    deletePatient(index) {
      this.patients.splice(index, 1); // Remove patient from the local array
      localStorage.setItem("patients", JSON.stringify(this.patients)); 
    },
  },
   mounted() {
    // Load patient data from localStorage
    this.patients = JSON.parse(localStorage.getItem("patients")) || [];
  },
};
