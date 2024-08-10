package com.mock.bodyguards.dto.response;

import io.swagger.v3.oas.annotations.media.Schema;
import jakarta.validation.constraints.AssertFalse;
import lombok.AllArgsConstructor;
import lombok.Data;
import lombok.Getter;
import lombok.Setter;
import lombok.experimental.SuperBuilder;
import org.springframework.http.HttpStatus;

import java.time.LocalDateTime;

/**
 * Response for error
 *
 * @author Viet Doan
 * @version 1.0
 * @since 10.08.2024
 */
@AllArgsConstructor
@Getter
@Setter
@SuperBuilder
@Schema(
        name = "ErrorResponse",
        description = "Schema to hold error response information"
)
public class ErrorResponse extends AbstractBaseResponse {
    @Schema(
            description = "API path invoked by client",
            example = "/api/v1/example"
    )
    private  String apiPath;

    @Schema(
            description = "Error code representing the error happened",
            example = "BAD_REQUEST"
    )
    private HttpStatus errorCode;

    @Schema(
            description = "Error message representing the error happened",
            example = "Bad request"
    )
    private  String errorMessage;

    @Schema(
            description = "Time representing when the error happened",
            example = "2022-08-10T10:10:10"
    )
    private LocalDateTime timestamp;

}
