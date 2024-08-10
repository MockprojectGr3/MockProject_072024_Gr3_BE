package com.mock.bodyguards.dto.response;

import io.swagger.v3.oas.annotations.media.Schema;
import lombok.AllArgsConstructor;
import lombok.Data;
import lombok.Getter;
import lombok.Setter;
import lombok.experimental.SuperBuilder;
import org.springframework.http.HttpStatus;

import java.time.LocalDateTime;

/**
 * Response for success
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
        name = "SuccessResponse",
        description = "Response for success"
)
public class SuccessResponse<T> extends AbstractBaseResponse {

    @Schema(
            description = "Time representing when the response happened"
    )
    private LocalDateTime timestamp;

    @Schema(
            description = "Status code representing the response happened"
    )
    private HttpStatus    statusCode;

    @Schema(
            description = "Status message representing the response happened"
    )
    private String        statusMessage;

    @Schema(
            description = "Data representing the response happened"
    )
    private T data;
}
