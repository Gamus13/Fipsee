import React, { useEffect, useState } from 'react';
import axios from 'axios';
import Cardinvest from '../Dashbord/DashbordProjet/Card/Card2';

export default function List({ data }) {
  const dataList = data?.sortedProducts || [];

  // console.log("LisProject data", dataList);

  return (
    <div style={{ height: '80vh', overflow: 'auto' }}>
      <div style={{ display: 'flex', flexWrap: 'wrap', marginTop: '8%', marginRight: '5%', justifyContent: 'flex-end', gap: '18px' }}>
        {dataList.map((product) => (
          <Cardinvest key={product.id} data={product} style={{ flexBasis: 'calc(33.33% - 20px)', zIndex: -1 }} />
        ))}
      </div>
    </div>
  );
}