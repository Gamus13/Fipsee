

import React, { useState, useEffect } from 'react';
import axios from '../../axios';

import './Formulaire1.css';

const FormComponent = () => {
  const [formData, setFormData] = useState({
    nom: '',
    prenom: '',
    email: '',
    motDePasse: ''

  });

  useEffect(() => {
    const fetchData = async () => {
      try {
        const response = await axios.get('/user');
        const user = response.data.data;
        setFormData(user);
        console.log('Données utilisateur :', user);
      } catch (error) {
        console.error('Erreur lors de la récupération des informations de l\'utilisateur :', error);
      }
    };

    fetchData();
  }, []);

  const handleChange = (e) => {
    const { name, value } = e.target;
    setFormData((prevFormData) => ({
      ...prevFormData,
      [name]: value
    }));
  };

  const handleSubmit = (e) => {
    e.preventDefault();
    console.log(formData);
  };

  return (
    // <form onSubmit={handleSubmit} className='Sentdata'>
    //   <div className="allGroup">
    //     <div className='group-1'>
    //       <div>
    //         <label htmlFor="nom">Nom :</label>
    //         <input
    //           type="text"
    //           id="nom"
    //           name="nom"
    //           className='retord1'
    //           value={formData.name}
    //           onChange={handleChange}
    //           readOnly // pour empecher a l'utilisateur de modifier le champs 
    //         />
    //       </div>
    //       <div>
    //         <label htmlFor="prenom">Prénom :</label>
    //         <input
    //           type="text"
    //           id="prenom"
    //           name="prenom"
    //           className='retord2'
    //           value={formData.lastName}
    //           onChange={handleChange}
    //           readOnly
    //           />
    //       </div>
    //     </div>
    //     <div className="group-2">
    //       <div>
    //         <label htmlFor="email">Email :</label>
    //         <input
    //           type="email"
    //           id="email"
    //           name="email"
    //           className='retord3'
    //           value={formData.email}
    //           onChange={handleChange}
    //           readOnly
    //         />
    //       </div>
    //       <div>
    //         <label htmlFor="motDePasse">Mot de passe :</label>
    //         <input
    //           type="password"
    //           id="motDePasse"
    //           className='retord4'
    //           name="motDePasse"
    //           value={formData.motDePasse}
    //           onChange={handleChange}
    //           readOnly
    //         />
            
    //       </div>
    //     </div>
    //     <div className="group-3">
    //       <div>
    //         <label htmlFor="motDePasse">Ancien Mot de passe :</label>
    //         <input
    //           type="password"
    //           id="motDePasse"
    //           className='retord5'
    //           name="oldmotDePasse"
    //           onChange={handleChange}
    //           readOnly
    //         />
            
    //       </div>
    //       <div>
    //         <label htmlFor="motDePasse">Nouveau Mot de passe :</label>
    //         <input
    //           type="password"
    //           id="motDePasse"
    //           className='retord6'
    //           name="motDePasse"
    //           onChange={handleChange}
    //           readOnly
    //         />
            
    //       </div>
    //     </div>
    //   </div>
      
     
    //   <button type="submit" className='sentbtn'>Envoyer</button>
    // </form>
    <div className="containertt">
      <div className="title">Vos informations</div>
      <form onSubmit={handleSubmit} action="#">
        <div className="form-group">
          <span htmlFor="nom">Noms</span>
          <input 
           type="text" 
           id="nom"
           name="nom" 
           value={formData.name} 
           onChange={handleChange} 
           readOnly 
           placeholder="Enter name" 
           required 
          />
        </div>
        <div className="form-group">
    
          <span htmlFor="prenom">Prenoms</span>
          <input type="text" 
            id="prenom" 
            name="prenom" 
            value={formData.lastName} 
            onChange={handleChange}  
            readOnly 
            placeholder="Enter username" 
            required 
          />
        </div>
        <div className="form-group">
        
          <span htmlFor="email">Email</span>
          <input type="email" 
            id="email" 
            name="email" 
            value={formData.email} 
            onChange={handleChange} 
            readOnly 
            placeholder="Enter email" 
            required 
          />
        </div>
        <div className="form-group">
          <span>Nouveau mot de passe</span>
          <input type="password" placeholder="Entrer un nouveau mot de passe" required />
        </div>
        <div className="form-group">
       
          <span  htmlFor="motDePasse">Mot de passe actuel</span>
          <input type="password" 
          id="motDePasse" 
          name="oldmotDePasse" 
          onChange={handleChange}  
          readOnly 
          placeholder="votre mot de passe" 
          required />
        </div>
        <div className="form-group">
          <span>Confirmation</span>
          <input type="password" placeholder="confirmer votre nouveau mot de passe" required />
        </div>
        <div className="button">
          <input type="submit" value="envoyer" />
        </div>
      </form>
    </div>
  

  );
};

export default FormComponent; 