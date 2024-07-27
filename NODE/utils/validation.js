export const isEmailValid = (email) => {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(String(email).toLowerCase());
};

export const isPasswordStrong = (password) => {
    // A strong password example: At least 8 characters, including uppercase, lowercase, number, and special character
    const re = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*\W).{8,}$/;
    return re.test(String(password));
};
