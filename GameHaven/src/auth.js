import { reactive, ref } from "vue";

export const currentUser = ref(null);

export const authState = reactive({
  users: JSON.parse(localStorage.getItem("users")) || [],
});

export function registerUser(username, password) {
  const userExists = authState.users.find((user) => user.username === username);
  if (userExists) {
    return { success: false, message: "Username already exists" };
  }

  const newUser = { username, password };
  authState.users.push(newUser);
  localStorage.setItem("users", JSON.stringify(authState.users));
  currentUser.value = newUser;
  return { success: true };
}

export function loginUser(username, password) {
  const user = authState.users.find(
    (user) => user.username === username && user.password === password
  );
  if (user) {
    currentUser.value = user;
    return { success: true };
  } else {
    return { success: false, message: "Invalid username or password" };
  }
}

export function logoutUser() {
  currentUser.value = null;
}

export function updateCurrentUser(updatedData) {
  const index = authState.users.findIndex(
    (user) => user.username === currentUser.value.username
  );
  if (index !== -1) {
    authState.users[index] = { ...authState.users[index], ...updatedData };
    localStorage.setItem("users", JSON.stringify(authState.users));
    currentUser.value = authState.users[index];
  }
}
