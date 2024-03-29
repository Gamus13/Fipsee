import * as React from 'react';
import LoadingButton from '@mui/lab/LoadingButton';
import Box from '@mui/material/Box';
import FormControlLabel from '@mui/material/FormControlLabel';
import Switch from '@mui/material/Switch';
import SaveIcon from '@mui/icons-material/Save';
import SendIcon from '@mui/icons-material/Send';

export default function LoadingButtonsTransition() {
  const [loading, setLoading] = React.useState(true);
  function handleClick() {
    setLoading(true);
  }

  return (
    <div style={{ alignContent: 'center', marginLeft: '105px', }}>
      
      

      <Box sx={{ '& > button': { m: 1 } }}>
        
        <LoadingButton
          onClick={handleClick}
          loading={loading}
          loadingPosition="end"
          variant="contained"
        >
          <span>Voir plus</span>
        </LoadingButton>
       
      </Box>
        {/* <FormControlLabel
          sx={{
            display: 'block',
          }}
          control={
            <Switch
              checked={loading}
              onChange={() => setLoading(!loading)}
              name="loading"
              color="primary"
            />
          }
          label="Loading"
        /> */}
    </div>
  );
}