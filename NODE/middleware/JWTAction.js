import dotenv from 'dotenv';
import jwt from "jsonwebtoken";
// import { DESCRIBE } from "sequelize/types/query-types";

const nonSecurePaths = ["/logout", "/login", "/register"];

export const createJWT = (payload) => {
    let key = process.env.JWT_SECRET;
    let token = null;
    try {
        token = jwt.sign(payload, key, { expiresIn: process.env.JWT_EXPIRES_IN });
    } catch (error) {
        console.log(error);
    }
    return token;
};

export const verifyToken = (token) => {
    let key = process.env.JWT_SECRET;
    let decoded = null;
    try {
        decoded = jwt.verify(token, key);
    } catch (error) {
        console.log(error);
    }
    return decoded;
};

export const checkUserJWT = (req, res, next) => {
    if (nonSecurePaths.includes(req.path)) return next();

    let cookies = req.cookies;
    let tokenFromHeader = extractToken(req);

    if ((cookies && cookies.jwt) || tokenFromHeader) {
        let token = cookies && cookies.jwt ? cookies.jwt : tokenFromHeader;
        let decoded = verifyToken(token);
        if (decoded) {
            req.user = decoded;
            req.token = token;
            next();
        } else {
            return res.status(401).json({
                EM: -1,
                DT: "",
                EM: "Not authenticated the user 1",
            });
        }
    } else {
        return res.status(401).json({
            EM: -1,
            DT: "",
            EM: "Not authenticated the user 2",
        });
    }
};

export const checkUserPermission = (req, res, next) => {
    if (nonSecurePaths.includes(req.path) || req.path === "/account")
        return next();

    if (req.user) {
        let email = req.user.email;
        let roles = req.user.groupWithRoles.Roles;
        let currentUrl = req.path;
        if (!roles || roles.length === 0) {
            return res.status(403).json({
                EM: -1,
                DT: "",
                EM: `You don't have permission to access this resource...`,
            });
        }

        let canAccess = roles.some(
            (item) => item.url === currentUrl || currentUrl.includes(item.url)
        );
        if (canAccess === true) {
            next();
        } else {
            return res.status(403).json({
                EM: -1,
                DT: "",
                EM: `You don't have permission to access this resource...`,
            });
        }
    } else {
        return res.status(401).json({
            EM: -1,
            DT: "",
            EM: "Not authenticated the user 3",
        });
    }
};
