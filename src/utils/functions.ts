import axios from "axios";

export async function sendApiRequest(url: string, formData: FormData) {
  try {
    const response = await axios({
      url: url,
      method: "post",
      data: formData,
      headers: {
        "X-Requested-With": "XMLHttpRequest",
        "Content-Type": "multipart/form-data",
      },
    });
    return response.data;
  } catch (error) {
    throw error;
  }
}
