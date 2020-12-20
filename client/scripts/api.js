import axios from 'axios';

const apiPath = process.env.API;


const queryQueue = [];

const apiCall = ({url, data = {}, method, headers = {}}) =>
  new Promise(async (resolve, reject) => {

    const appendData = {};
    if (data !== undefined) appendData[method === 'get' ? 'params' : 'data'] = data;

    let res = await axios({
      method: method || 'post',
      url: apiPath + url,
      timeout: 100000,
      ...appendData,
      headers,
      withCredentials: true,
    }).then(resolve).catch(reject);

  });

export default apiCall;

