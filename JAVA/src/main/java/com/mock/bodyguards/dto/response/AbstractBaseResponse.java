package com.mock.bodyguards.dto.response;

import com.fasterxml.jackson.annotation.JsonIgnoreProperties;
import com.fasterxml.jackson.annotation.JsonInclude;
import lombok.experimental.SuperBuilder;

/**
 * This class serves as a superclass for all responses in the project.
 *
 * @author Viet Doan
 * @version 1.0
 * @since 10.08.2024
 */
@JsonInclude(JsonInclude.Include.NON_NULL)
@JsonIgnoreProperties(ignoreUnknown = true)
@SuperBuilder
public abstract class AbstractBaseResponse {
    protected AbstractBaseResponse() {
    }
}